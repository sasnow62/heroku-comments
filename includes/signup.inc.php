<?php
session_start();
include '../dbh.php';

$last = $_POST['last'];
$first = $_POST['first'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

if (empty($last)) {
   header("Location: ../signup.php?error=empty");
   exit();
} elseif(empty($first)) {
   header("Location: ../signup.php?error=empty");
   exit();
} elseif (empty($uid)) {
   header("Location: ../signup.php?error=empty");
   exit();
} elseif (empty($pwd)) {
   header("Location: ../signup.php?error=empty");
   exit();
} else {
   $sql = "SELECT uid FROM user WHERE uid='$uid'";
   $result = $conn->query($sql);
   $uidcheck = mysqli_num_rows($result);
   if ($uidcheck > 0) {
      header("Location: ../signup.php?error=username");
      exit();
   } else {
      $sql = "INSERT INTO user (last, first, uid, pwd) 
             VALUES ('$last', '$first', '$uid', '$pwd')";

      $result = $conn->query($sql);
      header("Location: ../index.php");
   }
}

?>
