<?php
//db connection attributes
$servername = "localhost";
$dbUsername = "adminASpecialGift";
$dbPassword = "s501ZmhU5q3rSAx0";
$dbName = "aspecialgift";

//connectionstring
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

//check if conn fails
if(!$conn){
    die("connection failed: ".mysqli_connect_error());
}
