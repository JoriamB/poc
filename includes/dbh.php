<?php
// Inlog credentials voor de database van sfeerline. 
// connect naar de database Sfeerline.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sfeer";

// Maak connectie
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connectie uitvoer op browser scherm
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connectie met database Sfeerline is gelukt"; // Uitvoer in browser

/*
// Ik had hier een probeersel om records toe te voegen met sql.
// dit is gelukt wordt record 0 in de db sfeerline, tabel klant.
// Ik heb alles uit gecommentarieerd omdat ik alleen de connectie wil en geen insert op dit moment.
$sql = "INSERT INTO klant (voornaam, achternaam, email)
VALUES ('Joep','Boe','Joep@example.com')";

// Controleert de insert in db
if ($conn->query($sql) === TRUE) {
    echo " Er is met succes een nieuw record aangemaakt";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/

// connectie met database wordt gesloten
//$conn->close();
?>