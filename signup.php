<?php
   include 'header.php';
?>

<body>

  <?php
     $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
     if (strpos($url, 'error=empty') !== false) {
         echo "<p class='required'>Make sure to fill out all fields!</p>";
     } elseif (strpos($url, 'error=username') !== false) {
         echo "<p class='required'>That username is already taken!</p>";
     }
     
   ?>

  <br>
  <h3 style="text-align: center;">SIGN UP</h3>
  <br>
  <?php
     if (isset($_SESSION['id'])) {
         echo "You are already logged in!";
     } else {
         echo "<form id='signup' action='includes/signup.inc.php' method='POST'>
	 <input type='text' name='last' placeholder='Last Name'><br><br>
	 <input type='text' name='first' placeholder='First Name'><br><br>
	 <input type='text' name='uid' placeholder='Username'><br><br>
	 <input type='password' name='pwd' placeholder='Password'><br><br>
	 <button type='submit'>SIGN UP</button></form>";
     }
  ?>
  
</body>
</html>
