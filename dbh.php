<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
echo $url
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

echo $server;

$conn = new mysqli($server, $username, $password, $db);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

?>