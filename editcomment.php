<?php
   include 'header.php';
   include 'dbh.php';
?>

<div class="content">
  <?php
       
       $cid = $_POST['cid'];
       $uid = $_POST['uid'];
       $date = $_POST['date'];
       $message = $_POST['message'];
       
       echo "<br><form method='POST' action='" . editComments($conn) . "'>
           <input type='hidden' name='cid' value='" . $cid ."' />
           <input type='hidden' name='uid' value='" . $uid ."' />
           <input type='hidden' name='date' value='" . $date . "' />
           <textarea name='message'>" . $message . "</textarea><br>
           <button type='submit' name='commentSubmit'>Comment</button><br><br>
           </form>";

       function editComments($conn) {
           if (isset($_POST['commentSubmit'])) {
               $cid = $_POST['cid'];
               $uid = $_POST['uid'];
               $date = $_POST['date'];
               $message = $_POST['message'];

               $sql = "UPDATE comments SET message='$message' WHERE cid='$cid'"; 
               $result = $conn->query($sql);
               header("Location: index.php");
           }
       }

  ?>
</div>

</body>
</html>
