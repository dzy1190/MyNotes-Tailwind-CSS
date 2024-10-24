<!-- templates/login.php -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <title>Login</title>
</head>
<body class="bg-auto dark:bg-gray-900 flex items-center justify-center min-h-screen relative overflow-hidden">
    <!-- Latar belakang yang menarik -->
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>

    <!--Switch Theme-->
    <button id="themeToggle" class="absolute top-4 right-4 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
        <span class="dark:hidden text-2xl">🌙</span>
        <span class="hidden dark:inline text-2xl">☀️</span>
    </button>

    <!-- Tombol kembali -->
    <a href="index.php" class="absolute top-4 left-4 text-gray-500 hover:text-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </a>

    <!--Login-->
    <div class="bg-auto p-8 rounded-lg shadow-md w-full max-w-md relative z-10 backdrop-blur-sm bg-opacity-80">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800 dark:text-gray-200">Login</h2>

        <!-- Alert jika ada pesan error -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="bg-red-500 text-white text-center p-2 mb-4 rounded">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']); // Menghapus pesan error setelah ditampilkan
                ?>
            </div>
        <?php endif; ?>

        <form action="login_action.php" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Email</label>
                <input name="email" type="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan email Anda" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Password</label>
                <input name="password" type="password" id="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan password Anda" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Login</button>
        </form>
        <!-- Anchor untuk Register -->
        <p class="mt-4 text-center text-gray-600 dark:text-gray-400">
            Belum punya akun? <a href="signup.php" class="text-blue-500 hover:underline">Daftar di sini</a>
        </p>
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
