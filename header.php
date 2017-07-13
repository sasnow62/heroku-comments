<?php

session_start();
   
?>


<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8"></meta>
<meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>

<link rel="stylesheet" href="style.css" type="text/css" />

 <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    
<title>PHP Login and Comments</title>

</head>
<body>

  <header>
    <div class='title'>
      <a href='index.php'>
        <img src='university-logo.jpg' class='title__logo' alt='university' />
      </a>
      <p class='title__name'>EDUCATION INSTITUTE</p>
    </div>
    <nav>
      <ul>
        <?php

	        if (isset($_SESSION['id'])) {
	          echo "<form class='logout' action='includes/logout.inc.php'>
		            <button>LOG OUT</button></form>";
	        } else {
	          echo "<form class='login' method='POST' action='includes/login.inc.php'>
                    <input type='text' name='uid' placeholder='Username'>
                    <input type='password' name='pwd' placeholder='Password'>
                    <button type='submit'>LOGIN</button></form>";
	        }

        ?>
	    <li><a href="signup.php" class='signup'>SIGN UP</a></li>
      </ul>
    </nav>
  </header>
