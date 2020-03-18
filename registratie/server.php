<?php
// Starten van een sessie
session_start();

// Dit is onze database connection handler 
include_once '../includes/dbh.php'; 

// Hier wijs ik de variabelen toe
$voornaam="";
$achternaam="";
$klantnummer="";
$gebruikersnaam = "";
$email    = "";
$errors = array(); 

// REGISTEER de gebruiker (KLANT)
if (isset($_POST['reg_klant'])) {
  // Ontvang alle waarden van het registraite formulier
  $voornaam = mysqli_real_escape_string($conn, $_POST['voornaam']);
  $achternaam = mysqli_real_escape_string($conn, $_POST['achternaam']);
  $gebruikersnaam = mysqli_real_escape_string($conn, $_POST['gebruikersnaam']); 
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $wachtwoord_1 = mysqli_real_escape_string($conn, $_POST['wachtwoord_1']);
  $wachtwoord_2 = mysqli_real_escape_string($conn, $_POST['wachtwoord_2']);

  // Voor validatie: verzeker ervan dat het formulier goed is ingevuld ...
  // door toe te voegen (array_push()) in de corrensponderende $errors array
  if (empty($voornaam)) { array_push($errors, "Voornaam moet worden ingevuld."); }
  if (empty($achternaam)) { array_push($errors, "Achternaam moet worden ingevuld."); }
  if (empty($gebruikersnaam)) { array_push($errors, "Gebruikersnaam moet worden ingevuld."); }
  if (empty($email)) { array_push($errors, "E-mail moet worden ingevuld."); }
  if (empty($wachtwoord_1)) { array_push($errors, "Wachtwoord moet worden ingevuld."); }
  if ($wachtwoord_1 != $wachtwoord_2) {
	array_push($errors, "De twee wachtwoorden zijn niet gelijk.");
  }

  // Check eerst in de database of er al niet een gebruiker bestaat...
  // met dezelfde naam of email (ik check deze 2 omdat deze uniek moeten zijn) ...
  // Ik krijg hier problemen met het ontwerp van onze database ;)
  $klant_check_query = "SELECT * FROM user WHERE gebruikersnaam='$gebruikersnaam'";
  $result = mysqli_query($conn, $klant_check_query);
  $klant = mysqli_fetch_assoc($result);
  
  if ($klant) { // if user exists
    if ($klant['Gebruikersnaam'] === $gebruikersnaam) {
      array_push($errors, "Gebruikersnaam besaat al.");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$wachtwoord = md5($wachtwoord_1); //encrypt het wachtwoord voordat het wordt opgeslagen in de database

  	$query = "INSERT INTO user (Gebruikersnaam, Wachtwoord) 
  			  VALUES('$gebruikersnaam', '$wachtwoord')";
      mysqli_query($conn, $query);
  	$_SESSION['Gebruikersnaam'] = $gebruikersnaam;
  	$_SESSION['gelukt'] = "Je bent nu ingelogd";
  	header('location: ../registratie/login.php');
  }
}

// LOGIN USER
if (isset($_POST['login_klant'])) {
    $gebruikersnaam = mysqli_real_escape_string($conn, $_POST['gebruikersnaam']);
    $wachtwoord = mysqli_real_escape_string($conn, $_POST['wachtwoord']);
  
    if (empty($gebruikersnaam)) {
        array_push($errors, "Gebruikersnaam moet ingevoerd worden");
    }
    if (empty($wachtwoord)) {
        array_push($errors, "Wachtwoord moet ingevoerd worden");
    }
  
    if (count($errors) == 0) {
        $wachtwoord = md5($wachtwoord);
        $query = "SELECT * FROM user WHERE Gebruikersnaam='$gebruikersnaam' AND Wachtwoord='$wachtwoord'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['gebruikersnaam'] = $gebruikersnaam;
          $_SESSION['Gelukt'] = "Je bent ingelogd";
          header('location: index.php');
        }else {
            array_push($errors, "Verkeerde gebruikersnaam en/of wachtwoord");
        }
    }
  }
  
  ?>