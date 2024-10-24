<?php
// Mulai session
session_start();

// Cek apakah pengguna sudah login
$is_logged_in = isset($_SESSION['user_id']);
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
    <main class="bg-white dark:bg-gray-900">
        <div>
            <header class="absolute inset-x-0 top-0 z-50">
                <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                    <div class="flex lg:flex-1">
                        <a href="#" class="-m-1.5 p-1.5 text-black dark:text-white font-bold text-2xl">
                            MyNotes
                        </a>
                    </div>
                    <div class="flex lg:hidden">
                        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Open main menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                            </svg>
                        </button>
                    </div>
                    <div class="hidden lg:flex lg:gap-x-12">
                        <a href="index.php" class="text-sm font-semibold leading-6 text-black dark:text-white">Home</a>
                        <a href="notes.php" class="text-sm font-semibold leading-6 text-black dark:text-white">Notes</a>
                        <a href="aboutus.php" class="text-sm font-semibold leading-6 text-black dark:text-white">About Us</a>
                    </div>
                    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                        <?php if ($is_logged_in): ?>
                            <!-- Tampilkan tombol Logout jika pengguna sudah login -->
                            <a href="logout.php" class="text-sm font-semibold leading-6 text-black dark:text-white">Logout <span aria-hidden="true">&rarr;</span></a>
                        <?php else: ?>
                            <!-- Tampilkan tombol Login jika pengguna belum login -->
                            <a href="login.php" class="text-sm font-semibold leading-6 text-black dark:text-white">Log in <span aria-hidden="true">&rarr;</span></a>
                        <?php endif; ?>
                        <button id="themeToggle" class="ml-4 mr-4 text-sm font-semibold leading-6 text-black dark:text-white">
                            <span class="dark:hidden">🌙</span>
                            <span class="hidden dark:inline">☀️</span>
                        </button>
                    </div>
                </nav>
            </header>

            <div class="relative isolate px-6 pt-14 lg:px-8">
                <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                    <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                        <div class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 dark:text-white ring-1 ring-gray-900/10 hover:ring-gray-900/20 dark:ring-gray-500 dark:hover:ring-gray-400">
                            Announcing our next round of funding. <a href="#" class="font-semibold text-indigo-600"><span class="absolute inset-0" aria-hidden="true"></span>Read more <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="text-balance text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-6xl">Welcome to MyNotes</h1>
                        <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">You Can Save Your Notes Here, And Access It Everywhere</p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <a href="notes.php" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                            <a href="#" class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-300">Learn more <span aria-hidden="true">→</span></a>
                        </div>
                    </div>
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
