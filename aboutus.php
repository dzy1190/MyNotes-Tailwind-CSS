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
            // ... konfigurasi lainnya ...
        }
    </script>
</head>
<body>
    <main class="bg-white dark:bg-gray-900">
        <div >
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
              <!-- Mobile menu, show/hide based on menu open state. -->
              <div class="lg:hidden" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-50"></div>
                <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                  <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                      <span class="sr-only">Your Company</span>
                      <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                      <span class="sr-only">Close menu</span>
                      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                  <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                      <div class="space-y-2 py-6">
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Product</a>
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
                      </div>
                      <div class="py-6">
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </header>
            <div class="relative isolate px-6 pt-14 lg:px-8">
              <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
              </div>
              <div class="py-24 sm:py-32">
                <div class="mx-auto max-w-4xl px-6 lg:px-8 text-center">
                  <div class="mx-auto max-w-4xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-gray-100">Meet our Creators</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-400">This is a people who create this website there are 5 people who created this website, they are all students at the SMK Negeri 4 Padalang.</p>
                  </div>
                  <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    <li>
                      <div class="flex flex-col items-center text-center">
                        <img class="h-64 w-64 object-cover rounded-lg mb-4" src="./src/chudai.png" alt="">
                        <div>
                          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900 dark:text-gray-300">Anwar Zaidan</h3>
                          <p class="text-lg font-semibold leading-6 text-indigo-600">Panglima Ngoding</p>
                        </div>
                      </div>
                    </li>

                    <li>
                      <div class="flex flex-col items-center text-center">
                        <img class="h-64 w-64 object-cover rounded-lg mb-4" src="./src/sirin.png" alt="">
                        <div>
                          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900 dark:text-gray-300">Sirin Dihya</h3>
                          <p class="text-lg font-semibold leading-6 text-indigo-600">Ratu Coding</p>
                        </div>
                      </div>
                    </li>

                    <li>
                      <div class="flex flex-col items-center text-center">
                        <img class="h-64 w-64 object-cover rounded-lg mb-4" src="./src/janu.jpg" alt="">
                        <div>
                          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900 dark:text-gray-300">Qomarudin Januar</h3>
                          <p class="text-lg font-semibold leading-6 text-indigo-600">El Jomok</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                    <li class="lg:-col-start-20">
                      <div class="flex flex-col items-center text-center">
                        <img class="h-64 w-64 object-cover rounded-lg mb-4" src="./src/alomani.jpg" alt="">
                        <div>
                          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900 dark:text-gray-300">Muhamad Dzikri</h3>
                          <p class="text-lg font-semibold leading-6 text-indigo-600">Front-end Developer</p>
                        </div>
                      </div>
                    </li>

                    <li class="lg:col-start-40">
                      <div class="flex flex-col items-center text-center">
                        <img class="h-64 w-64 object-cover rounded-lg mb-4" src="./src/dinar.jpg" alt="">
                        <div>
                          <h3 class="text-xl font-semibold leading-7 tracking-tight text-gray-900 dark:text-gray-300">Dinar Aziz</h3>
                          <p class="text-lg font-semibold leading-6 text-indigo-600">Backend Developer</p>
                        </div>
                      </div>
                    </li>
                  </ul>
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
