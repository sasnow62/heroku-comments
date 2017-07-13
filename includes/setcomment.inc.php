<?php

include '../dbh.php';

setComment($conn);

function setComment($conn) {
    if (isset($_POST['commentSubmit'])) {
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $sql = "INSERT INTO comments (uid, date, message) 
                VALUES ('$uid', '$date', '$message')";
        $result = $conn->query($sql);

        header('Location: ../index.php');
        exit();
    }
}


?>