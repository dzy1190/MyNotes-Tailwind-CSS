<?php
// config/database.php
$host = 'localhost';
$dbname = 'web_notes';
$username = 'root'; // sesuaikan dengan username database
$password = ''; // sesuaikan dengan password database

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
