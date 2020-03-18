<?php include('server.php') // hier link ik naar server.php. Wil ik in de map include zetten voor de structuur. ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registratie en login met PHP and MySQL voor Sfeerline</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Registreer</h2>
  </div>

  <form method="post" action="login.php">
  	<?php include('errors.php'); ?> <!-- Error melding als de gegevens niet overeenkomen met wat gevraagd wordt. -->

	<div class="input-group">
  	  <label>Voornaam</label>
  	  <input type="text" name="voornaam" value="<?php echo $voornaam; ?>"> <!-- hier je voornaam invullen -->
  	</div>

	<div class="input-group">
  	  <label>Achternaam</label>
  	  <input type="text" name="achternaam" value="<?php echo $achternaam; ?>"> <!-- hier je achternaam invullen -->
  	</div>

	<!-- hier je gebruikersnaam invullen alleen klopt dit niet met de database -->
  	<div class="input-group">
  	  <label>Gebruikersnaam</label>
  	  <input type="text" name="gebruikersnaam" value="<?php echo $gebruikersnaam; ?>">
  	</div>

  	<div class="input-group">
  	  <label>E-mail</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>"> <!-- hier je e-mail invullen -->
  	</div>

  	<div class="input-group">
  	  <label>Wachtwoord</label>
  	  <input type="password" name="wachtwoord_1"> <!-- wachtwoord wordt gehashed opgeslagen in db -->
  	</div>

  	<div class="input-group">
  	  <label>Bevestig wachtwoord</label>
  	  <input type="password" name="wachtwoord_2"> <!-- wachtwoord bevestigen -->
  	</div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_klant">Registreer</button> <!-- bevestigen/ verzenden -->
  	</div>

  	<p>
  		Bent u al klant? <a href="login.php">Inloggen</a> <!-- Als je al klant bent dan op inloggen klikken. Link naar login pagina. -->
  	</p>
  </form>
</body>
</html>