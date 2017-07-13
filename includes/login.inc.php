<?php
session_start();
include '../dbh.php';

/* Escape inputs to prevent SQL Injection */
$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";
$result = $conn->query($sql);

if (!$row = $result->FETCH_ASSOC()) {
   echo "Your username or password is incorrect.";
} else {
   $_SESSION['id'] = $row['id'];
};

header("Location: ../index.php");
exit();

?>
