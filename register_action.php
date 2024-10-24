<?php
// actions/register_action.php
require './database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password untuk keamanan
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Masukkan user baru ke dalam database
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);

    if ($stmt->execute()) {
        header("Location: ./login.php"); // Redirect ke halaman login setelah berhasil register
        exit();
    } else {
        echo "Terjadi kesalahan, coba lagi.";
    }
}
?>
