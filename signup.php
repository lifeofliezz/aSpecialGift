<?php
require "header.php";
?>

    <main>
        <div class="wrapper-main">
            <section class="section-default">
                <h1>Signup</h1>
                <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]=="emptyfields"){
                        echo'<p>Fill in all fields </p> ';
                    }
                    else if ($_GET["error"]=="invalidmailuid"){
                        echo'<p>Invalid email</p> ';
                    }
                    else if ($_GET["error"]=="invalidmail"){
                        echo'<p>Invalid email</p> ';
                    }
                    else if ($_GET["error"]=="invaliduid"){
                        echo'<p>Invalid username</p> ';
                    }
                    else if ($_GET["error"]=="passwordcheck"){
                        echo'<p>Password is not the same as repeated password</p> ';
                    }
                    else if ($_GET["error"]=="userexists"){
                        echo'<p>Username allready excists</p> ';
                    }

                }

                else if(isset($_GET["signup"])=="success"){
                    echo'<p>Signup succesfull</p> ';
                }
                ?>

                <form class="form-signup"  action="includes/signup.inc.php" method="post">
                    <input type="text" id="uid" name="uid" placeholder="Username" value=<?php if(isset($_GET['uid'])){echo $_GET['uid'];}?>>
                    <input type="text" id= "mail" name="mail" placeholder="Email" value=<?php if(isset($_GET['mail'])){echo $_GET['mail'];}?>>
                    <input type="password" id="pwd" name="pwd" placeholder="Password">
                    <input type="password" id="pwd-repeat" name="pwd-repeat" placeholder="Repeat password">
                    <button type="submit" name="signup-submit">Submit</button>

                </form>
            </section>
        </div>
    </main>

<?php
require "footer.php";
?>