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

// Sicherstellen, dass Eingaben vorhanden sind
if (empty($user) || empty($pass)) {
    die("Benutzername oder Passwort fehlt.");
}

// Sicheres SQL mit Prepared Statements
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
if ($stmt === false) {
    die("Fehler beim Vorbereiten der Abfrage: " . $conn->error);
}

$stmt->bind_param('ss', $user, $pass);
$stmt->execute();
$result = $stmt->get_result();

// Prüfen, ob ein Ergebnis vorliegt
if ($result->num_rows > 0) {
    // Ergebnis verarbeiten
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
$stmt->close();
$conn->close();
?>
