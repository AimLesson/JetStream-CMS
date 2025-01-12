<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'News Portal')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite('resources/css/app.css') --}}

    <style>
        /* Add this in your app.css or a <style> tag */
        @keyframes reveal {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .content-reveal {
            animation: reveal 0.8s ease-out;
        }

        #mobile-menu {
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            transform: translateY(-10px);
            opacity: 0;
        }

        #mobile-menu.hidden {
            display: none;
        }

        #mobile-menu:not(.hidden) {
            transform: translateY(0);
            opacity: 1;
        }

    </style>

</head>

<body class="font-sans" style="background-image: url('{{ asset('storage/' . $profile->background) }}'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <!-- Navbar -->
    {{-- <header class="bg-white shadow fixed top-0 left-0 w-full z-40">
        <div class="flex justify-between items-center px-4 py-4">
            <!-- Logo and Title -->
            <a href="{{ url('/') }}">
                <div class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo"
                        class="h-20 w-auto rounded-full">
                    <span class="self-center text-lg font-semibold whitespace-nowrap">{{ $profile->name }}</span>
                </div>
            </a>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-gray-800 hover:text-blue-500" id="mobile-menu-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Navigation Links -->
            <nav class="hidden lg:flex space-x-4" id="desktop-menu">
                <a href="{{ url('/') }}" class="text-gray-800 hover:text-blue-500">Home</a>
                <a href="{{ url('/about') }}" class="text-gray-800 hover:text-blue-500">About</a>

                <!-- Branches Dropdown -->
                <div class="relative">
                    <button class="text-gray-800 hover:text-blue-500 flex items-center" id="branches-menu">
                        Sekolah
                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute hidden bg-white shadow-lg rounded-lg mt-2 w-auto min-w-[200px] z-50"
                        id="branches-dropdown">
                        <div class="flex flex-col whitespace-nowrap">
                            @foreach ($branches as $branch)
                                <a href="{{ route('branches.show', $branch->id) }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    {{ $branch->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Mobile Menu -->
            <nav class="hidden absolute top-16 left-0 w-full lg:hidden" id="mobile-menu">
                <a href="{{ url('/') }}" class="text-gray-800 hover:bg-gray-100">Home</a>
                <a href="{{ url('/about') }}" class="text-gray-800 hover:bg-gray-100">About</a>
                <div>
                    <button class="flex items-center justify-between w-full px-4 py-2 text-gray-800 hover:bg-gray-100"
                        id="mobile-branches-menu">
                        Sekolah
                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="hidden bg-gray-50" id="mobile-branches-dropdown">
                        @foreach ($branches as $branch)
                            <a href="{{ route('branches.show', $branch->id) }}"
                                class="text-gray-800 hover:bg-gray-200">
                                {{ $branch->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </nav>

        </div>
    </header> --}}

    <header class="flex items-center bg-white/75 justify-between py-4 px-8 md:py-8">
        <a href="/" class="inline-flex items-center gap-2.5 text-md font-bold text-black md:text-2xl lg:text-xl" aria-label="logo">
            <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo" class="h-12 w-auto rounded-full">
            {{ $profile->name }}
        </a>
        <!-- Desktop Navigation -->
        <nav class="hidden gap-12 lg:flex">
            <a href="{{ url('/') }}" class="text-lg font-semibold text-indigo-500">Home</a>
            <a href="{{ url('/about') }}" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">About Us</a>
            <div class="relative group">
                <a href="#" class="text-lg font-semibold text-gray-600 transition duration-100 hover:text-indigo-500 active:text-indigo-700">
                    Sekolah
                </a>
                <div class="absolute right-0 mt-2 w-64 rounded-lg bg-white shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200 z-10">
                    @foreach ($branches as $branch)
                        <a href="{{ route('branches.show', $branch->id) }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">
                            {{ $branch->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </nav>
        <!-- Hamburger Button -->
        <button id="menu-button" type="button" class="inline-flex items-center gap-2 rounded-lg bg-gray-200 px-2.5 py-2 text-sm font-semibold text-gray-500 ring-indigo-300 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
        </button>
        <!-- Mobile Navigation -->
        <nav id="mobile-menu" class="hidden absolute top-20 left-0 w-full bg-white shadow-lg lg:hidden">
            <a href="{{ url('/') }}" class="block px-4 py-2 text-gray-900 hover:bg-gray-200">Home</a>
            <a href="{{ url('/about') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-200">About Us</a>
            @foreach ($branches as $branch)
                <a href="{{ route('branches.show', $branch->id) }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-200">
                    {{ $branch->name }}
                </a>
            @endforeach
        </nav>
    </header>
    
    

    <!-- Main Content -->
    <main class="container-fluid">
        @yield('content')
    </main>

    <div class="bg-white pt-4 sm:pt-10 lg:pt-12">
        <footer class="mx-auto max-w-screen-2xl px-4 md:px-8">
          <div class="flex flex-col items-center justify-between gap-4 border-t border-b py-6 md:flex-row">
            <!-- nav - start -->
            <nav class="flex flex-wrap justify-center gap-x-4 gap-y-2 md:justify-start md:gap-6">
              <a href="#" class="text-gray-500 transition duration-100 hover:text-indigo-500 active:text-indigo-600">About</a>
              <a href="#" class="text-gray-500 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Investor Relations</a>
              <a href="#" class="text-gray-500 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Jobs</a>
              <a href="#" class="text-gray-500 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Press</a>
              <a href="#" class="text-gray-500 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Blog</a>
            </nav>
            <!-- nav - end -->
      
            <!-- social - start -->
            <div class="flex gap-4">
              <a href="#" target="_blank" class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
              </a>
      
              <a href="#" target="_blank" class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                </svg>
              </a>
      
              <a href="#" target="_blank" class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                </svg>
              </a>
      
              <a href="#" target="_blank" class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
              </a>
            </div>
            <!-- social - end -->
          </div>
      
          <div class="py-8 text-center text-sm text-gray-400">{{ date('Y') }} {{ $profile->name }}. All rights reserved.</div>
        </footer>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dropdown = document.querySelector('.dropdown');
            const toggle = document.querySelector('.dropdown-toggle');

            toggle.addEventListener('mouseenter', () => {
                dropdown.classList.remove('hidden');
            });

            toggle.addEventListener('mouseleave', () => {
                dropdown.classList.add('hidden');
            });

            dropdown.addEventListener('mouseenter', () => {
                dropdown.classList.remove('hidden');
            });

            dropdown.addEventListener('mouseleave', () => {
                dropdown.classList.add('hidden');
            });
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuButton = document.getElementById('menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            menuButton.addEventListener('click', () => {
                // Toggle the "hidden" class
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainContent = document.querySelector('main');

            // Add the animation class on page load
            mainContent.classList.add('content-reveal');

            // Optionally, reapply the animation on navigation
            document.addEventListener('turbo:load',
        () => { // Replace 'turbo:load' with appropriate event if using another framework
                mainContent.classList.remove('content-reveal');
                // Trigger reflow to restart the animation
                void mainContent.offsetWidth;
                mainContent.classList.add('content-reveal');
            });
        });
    </script>



</body>

</html>
