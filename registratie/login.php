<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registratie en login met PHP and MySQL voor Sfeerline</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Gebruikersnaam</label>
  		<input type="text" name="gebruikersnaam" >
  	</div>
  	<div class="input-group">
  		<label>Wachtwoord</label>
  		<input type="password"  name="wachtwoord">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_klant">Login</button>
  	</div>
  	<p>
  		Nog geen klant? <a href="registreren.php">Registreer hier</a>
  	</p>
  </form>
</body>
</html>