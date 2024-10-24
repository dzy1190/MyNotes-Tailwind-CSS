<?php
// actions/edit_note.php
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

    // Ambil catatan berdasarkan id dan user_id
    $stmt = $conn->prepare("SELECT * FROM notes WHERE id = :id AND user_id = :user_id");
    $stmt->bindParam(':id', $note_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $note = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$note) {
        // Jika catatan tidak ditemukan atau bukan milik user yang login
        header("Location: ./notes.php");
        exit();
    }
} else {
    header("Location: ./notes.php");
    exit();
}

// Handle perubahan catatan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Update catatan di database
    $stmt = $conn->prepare("UPDATE notes SET title = :title, content = :content WHERE id = :id AND user_id = :user_id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':id', $note_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    // Redirect kembali ke halaman notes
    header("Location: ./notes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            // ... konfigurasi lainnya ...
        }
    </script>
</head>
<body class="bg-white dark:bg-gray-900 flex items-center justify-center min-h-screen">
<header class="absolute inset-x-0 top-0 z-50">
              <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                  <a href="#" class="-m-1.5 p-1.5 text-black dark:text-white font-bold text-2xl ">
                    MyNotes
                  </a>
                </div>
                <div class="flex lg:hidden">
                  <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                  </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                  <a href="index.php" class="text-sm font-semibold leading-6 text-black dark:font-semibold  dark:text-white">Home</a>
                  <a href="notes.php" class="text-sm font-semibold leading-6 text-black dark:font-semibold dark:text-white">Notes</a>
                  <a href="aboutus.php" class="text-sm font-semibold leading-6 text-black dark:font-semibold dark:text-white">About Us</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                  <a href="login.php" class="text-sm font-semibold leading-6 text-black dark:text-white">Log in <span aria-hidden="true">&rarr;</span></a>
                  <button id="themeToggle" class="ml-4 mr-4 text-sm font-semibold leading-6 text-black dark:text-white">
                    <span class="dark:hidden">🌙</span>
                    <span class="hidden dark:inline">☀️</span>
                  </button>
                </div>
              </nav>


                </div>
              </div>
            </header>
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold mb-6 text-center text-black dark:text-white">Edit Catatan</h2>

        <!-- Form untuk mengedit catatan -->
        <form action="" method="POST">
            <input type="text" name="title" value="<?= htmlspecialchars($note['title']) ?>" class="w-full mb-4 p-4 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 bg-transparent text-black dark:text-white">
            <textarea name="content" class="w-full h-64 p-4 mb-6 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 bg-transparent text-black dark:text-white resize-none"><?= htmlspecialchars($note['content']) ?></textarea>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 text-lg">
                Simpan Perubahan
            </button>
        </form>
    </div>
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
