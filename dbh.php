<?php

$servername = "localhost";
$username = "public";
$password = "openpass";
$db = "login-test";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

?>
