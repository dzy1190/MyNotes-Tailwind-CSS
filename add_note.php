<?php
// actions/add_note.php
session_start();
require './database.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];  // Ambil user_id dari session

    // Insert catatan baru ke database
    $sql = "INSERT INTO notes (user_id, title, content) VALUES (:user_id, :title, :content)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->execute();

    // Redirect kembali ke halaman notes
    header("Location: ./notes.php");
    exit();
}
?>
