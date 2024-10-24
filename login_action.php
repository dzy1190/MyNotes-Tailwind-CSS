<?php
// actions/login_action.php
session_start();
require './database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah email dan password sudah diisi
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email dan Password harus diisi!";
        header("Location: ./login.php");
        exit();
    }

    // Query untuk mendapatkan user berdasarkan email
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Cek apakah user ditemukan dan password cocok
    if ($user && password_verify($password, $user['password'])) {
        // Set session untuk login
        $_SESSION['user_id'] = $user['id'];  // Simpan user_id di session
        $_SESSION['email'] = $user['email'];
        header("Location: ./index.php");
        exit();
    } else {
        $_SESSION['error'] = "Login gagal! Email atau Password salah.";
        header("Location: ./login.php");
        exit();
    }
}
?>
