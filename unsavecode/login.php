<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simplesqlinjection";

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung überprüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Benutzereingaben auslesen
$user = $_POST['username'] ?? '';
$pass = $_POST['password'] ?? '';

// Unsichere SQL-Abfrage (anfällig für SQL-Injection)
$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
//$sql = "SELECT * FROM users WHERE username = 'admin' AND ( password = '' OR '1'='1')";
//$sql = "SELECT * FROM users WHERE username = 'admin'#' AND password = '$pass'";
$result = $conn->query($sql);

// Prüfen, ob ein Ergebnis vorliegt
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['username'] == 'admin') {
        echo "Hallo Admin!";
    } else {
        echo "Hallo Normaler Anwender!";
    }
} else {
    echo "Ungültige Anmeldedaten!";
}

// Verbindung schließen
$conn->close();
?>
