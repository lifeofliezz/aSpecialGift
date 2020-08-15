<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="nav-header-main">
            <a class="header-logo" href="index.php">
                <img src="img/header.png" alt="header">
            </a>
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">portfolio</a></li>
                <li><a href="#">about me</a></li>
                <li><a href="#">contact</a></li>
            </ul>

            <div class="header-login">
                <?php

                if (isset($_SESSION['userId'])) {
                    echo '<form action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button>
                </form>';
                } else {
                    echo '<form action="includes/login.inc.php" method="post">
                    <input type="text" name="mailuid" placeholder="username/email" >
                    <input type="password" name="pwd" placeholder="password" >
                    <button type="submit" name="login-submit">Login</button>
                </form>
                <a href="signup.php">Signup</a>';
                }


                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyfields") {
                        echo '<p>Fill in all fields </p> ';
                    } else if ($_GET["error"] == "wrongpwd") {
                        echo '<p>Invalid password</p> ';
                    } else if ($_GET["error"] == "nouser") {
                        echo '<p>User doesnt exist</p> ';
                    }
                }


                ?>




            </div>
        </nav>
    </header>

