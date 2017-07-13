<?php

include 'dbh.php';

if (isset($_SESSION['id'])) {
    echo "<br><form method='POST' action='includes/setcomment.inc.php'>
            <input type='hidden' name='uid' value='" . $_SESSION['id'] . "' />
            <input type='hidden' name='date' value='" . date('Y-m-d H:i:s') . "' />
            <textarea name='message'></textarea><br>
            <button type='submit' name='commentSubmit'>Comment</button><br><br>
          </form>";
    } else {
        echo "<br>You need to be logged in to comment!<br><br>";
    }

getComments($conn);
exit();

function getComments($conn) {
    ini_set('display_errors', true);
    error_reporting(E_ALL);
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $id = $row['uid'];
        $sql_users = "SELECT * FROM user WHERE id='$id'";
        $result_users  = $conn->query($sql_users);
        if ($row_users = $result_users->fetch_assoc()) {
            echo "<div class='comment-box'>";
            echo $row_users['uid'] . "<br>";
            echo $row['date'] . "<br>";
            echo "<p>" . nl2br($row['message']) . "</p><br>";
            if (isset($_SESSION['id'])) {
                if ($_SESSION['id'] == $row_users['id']) {
                    echo"<div class='edit-form'>
                           <form class='edit' method='POST' action='".deleteComments($conn)."'>
                             <input type='hidden' name='cid' value='" . $row['cid'] . "'>
                             <button type='submit' name='commentDelete'>Delete</button>
                           </form>";
                    echo "<form class='edit' method='POST' action='editcomment.php'>
                            <input type='hidden' name='cid' value='" . $row['cid'] . "' />
                            <input type='hidden' name='uid' value='" . $row['uid'] . "' />
                            <input type='hidden' name='date' value='" . $row['date'] . "' />
                            <input type='hidden' name='message' value='" . $row['message'] . "' />
                            <button name='editcomment' type='submit'>Edit</button>
                          </form>
                        </div>
                      </div>";
                } else {
                    echo "</div>";
                }
            } else {
                echo "</div>";
            }
        }
    }
    exit();
}

function deleteComments($conn) {
    if (isset($_POST['commentDelete'])) {
        $cid = $_POST['cid'];

        $sql = "DELETE FROM comments WHERE cid='$cid'";
        $result = $conn->query($sql);
        
        header("Location: index.php");
    }
}
    


?>
