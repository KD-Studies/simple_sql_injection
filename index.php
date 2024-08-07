<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simplesqlinjection";

// Erstelle Verbindung
$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfe Verbindung
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$nachricht = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Benutzereingaben
    $benutzername = $_POST['benutzername'];
    $passwort = $_POST['passwort'];

    // Unsichere SQL-Abfrage
    $sql = "SELECT * FROM benutzer WHERE benutzername = '$benutzername' AND passwort = '$passwort'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $nachricht = "Benutzer gefunden!";
    } else {
        $nachricht = "Keine Benutzer gefunden.";
    }
}

// Schließe die Verbindung
$conn->close();

// Inkludiere die HTML-Datei
include 'form.html';
?>
