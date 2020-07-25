<!DOCTYPE html>
<html>
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
                <form action="includes/login.inc.php" method="post">
                    <input type="text" name="mailuid" placeholder="username/email" >
                    <input type="password" name="pwd" placeholder="password" >
                    <button type="submit" name="login-submit">Login</button>
                </form>
                <a href="signup.php">Signup</a>
                <form action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button>
                </form>
            </div>
        </nav>
    </header>

