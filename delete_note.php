<?php
// actions/delete_note.php
session_start();
require './database.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit();
}

if (isset($_GET['id'])) {
    $note_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Hapus catatan dari database
    $stmt = $conn->prepare("DELETE FROM notes WHERE id = :id AND user_id = :user_id");
    $stmt->bindParam(':id', $note_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
}

// Redirect kembali ke halaman notes
header("Location: ./notes.php");
exit();
?>
