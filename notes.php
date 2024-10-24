<?php
// templates/notes.php
session_start();
require './database.php';

// Cek apakah pengguna sudah login
$is_logged_in = isset($_SESSION['user_id']);  // Periksa apakah pengguna sudah login

if ($is_logged_in) {
    $user_id = $_SESSION['user_id'];  // Ambil user_id dari session

    // Ambil semua catatan milik pengguna dari database
    $stmt = $conn->prepare("SELECT * FROM notes WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>
<body>
    <main class="bg-white dark:bg-gray-900 min-h-screen">
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <header class="absolute inset-x-0 top-0 z-50">
                <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                    <div class="flex lg:flex-1">
                        <a href="#" class="-m-1.5 p-1.5 text-black dark:text-white font-bold text-2xl">
                            MyNotes
                        </a>
                    </div>
                    <div class="hidden lg:flex lg:gap-x-12">
                        <a href="index.php" class="text-sm font-semibold leading-6 text-black dark:text-white">Home</a>
                        <a href="#" class="text-sm font-semibold leading-6 text-black dark:text-white">Notes</a>
                        <a href="aboutus.php" class="text-sm font-semibold leading-6 text-black dark:text-white">About Us</a>
                    </div>
                    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                        <?php if ($is_logged_in): ?>
                            <!-- Tampilkan tombol Logout jika pengguna sudah login -->
                            <a href="logout.php" class="text-sm font-semibold leading-6 text-black dark:text-white">Logout <span aria-hidden="true">&rarr;</span></a>
                        <?php else: ?>
                            <!-- Tampilkan tombol Login jika pengguna belum login -->
                            <a href="login.php" class="text-sm font-semibold leading-6 text-black dark:text-white">Login <span aria-hidden="true">&rarr;</span></a>
                        <?php endif; ?>
                        <button id="themeToggle" class="ml-4 mr-4 text-sm font-semibold leading-6 text-black dark:text-white">
                            <span class="dark:hidden">🌙</span>
                            <span class="hidden dark:inline">☀️</span>
                        </button>
                    </div>
                </nav>
            </header>

            <div class="container mx-auto px-4 pt-20">
                <h1 class="text-3xl font-bold mb-6 text-black dark:text-white">Catatan Saya</h1>

                <?php if ($is_logged_in): ?>
                    <!-- Form untuk menambah catatan baru -->
                    <div class="mb-6 bg-white dark:bg-gray-800 rounded-lg shadow-md p-8">
                        <form action="./add_note.php" method="POST">
                            <input type="text" name="title" placeholder="Masukkan judul catatan" class="w-full mb-4 p-4 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 bg-transparent text-black dark:text-white">
                            <textarea id="noteInput" name="content" class="w-full h-64 p-4 mb-6 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 bg-transparent text-black dark:text-white resize-none" placeholder="Masukkan catatan baru"></textarea>
                            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 text-lg">
                                Tambah Catatan
                            </button>
                        </form>
                    </div>

                    <!-- Daftar catatan -->
                    <ul id="noteList" class="space-y-4">
                        <?php foreach ($notes as $note): ?>
                            <li class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                                <h2 class="text-xl font-bold text-black dark:text-white"><?= htmlspecialchars($note['title']) ?></h2>
                                <p class="text-black dark:text-white"><?= htmlspecialchars($note['content']) ?></p>
                                <div class="mt-4 flex justify-end space-x-2">
                                    <a href="./edit_note.php?id=<?= $note['id'] ?>" class="text-indigo-600">Edit</a>
                                    <a href="./delete_note.php?id=<?= $note['id'] ?>" class="text-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus catatan ini?');">Delete</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <!-- Pesan jika belum login -->
                    <p class="text-xl text-center text-gray-600 dark:text-gray-400">Silakan login untuk melihat catatan Anda.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <script>
        const html = document.documentElement;
        const themeToggle = document.getElementById('themeToggle');

        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
        });

        // Check for saved theme preference or use system preference
        const savedTheme = localStorage.getItem('theme');
        const systemDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

        if (savedTheme === 'dark' || (!savedTheme && systemDarkMode)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }
    </script>
</body>
</html>
