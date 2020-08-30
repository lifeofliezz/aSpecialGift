<?php

if (isset($_POST['signup-submit'])){
    require 'dbh.inc.php';
    require 'createPresentCode.inc.php';

     $userName = $_POST['uid'];
     $email = $_POST['mail'];
     $password = $_POST['pwd'];
     $passwordRepeat = $_POST['pwd-repeat'];
     $presentCode = getPresentCode(7);


     //error handlers signup form
     //check if there are empty fields
     if (empty($userName) || empty($email) || empty($password) || empty($passwordRepeat) ){
        header("Location: ../signup.php?error=emptyfields&uid=".$userName."&mail=".$email);
        exit();
     }
    //check username characters an email is valid
     else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$userName)){
         header("Location: ../signup.php?error=invalidmailuid");
         exit();

     }
     //check if email is valid
     else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
         header("Location: ../signup.php?error=invalidmail&uid=".$userName);
         exit();
     }
    //check username characters
     else if (!preg_match("/^[a-zA-Z0-9]*$/",$userName)){
         header("Location: ../signup.php?error=invaliduid&mail=".$email);
         exit();
     }
     //check if password and passwordrepeat are equal
     else if($password !== $passwordRepeat){
         header("Location: ../signup.php?error=passwordcheck&uid=".$userName."&mail=".$email);
         exit();
     }
     //check if username allready excists
     else{
         $sql = "SELECT loginName FROM weddingcouple WHERE loginName = ?";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)){
             header("Location: ../signup.php?error=databaseerror");
             exit();
         }
         else{
             mysqli_stmt_bind_param($stmt, "s", $userName);
             mysqli_stmt_execute($stmt);
             mysqli_stmt_store_result($stmt);
             $checkResult = mysqli_stmt_num_rows($stmt);
             if($checkResult > 0){
                 header("Location: ../signup.php?error=userexists&mail=".$email);
                 exit();
             }
             else{
                 $sql = "INSERT INTO weddingcouple (loginName, emailWeddingCouple, pwdWeddingCouple, presentCode)VALUES (?,?,?,?)";
                 $stmt = mysqli_stmt_init($conn);
                 if (!mysqli_stmt_prepare($stmt, $sql)){
                     header("Location: ../signup.php?error=databaseerror");
                     exit();
                 }
                 else{
                     //hash password
                     $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                     mysqli_stmt_bind_param($stmt, "ssss", $userName, $email,$hashedPwd, $presentCode );
                     mysqli_stmt_execute($stmt);

                     header("Location: ../signup.php?signup=success");
                     exit();
                     }
                 }
             }
         }
     mysqli_stmt_close($stmt);
     mysqli_close($conn);
}
else{
    header("Location: ../signup.php");
    exit();

}