<?php 
  session_start(); 

  if (!isset($_SESSION['gebruikersnaam'])) {
  	$_SESSION['msg'] = "Je moet eerst inloggen";
  	header('location: login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['Gelukt'])) : ?>
      <div class="error gelukt" >
      	<h3>
          <?php 
          	echo $_SESSION['Gelukt'];
          	unset($_SESSION['Gelukt']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['gebruikersnaam'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['gebruikersnaam']; ?></strong></p>
    	<p> <a href="index.php?logout" style="color: red;">logout</a> </p>
    <?php endif ?>

    <?php

    $logout = $_SERVER['REQUEST_URI'];
    if (strpos($logout, 'logout') !== false) {
        session_destroy();
        header('location: login.php');
    }
    ?>
</div>
		
</body>
</html>