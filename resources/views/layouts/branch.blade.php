<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'News Portal')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    @vite('resources/css/app.css')

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
    </style>
</head>

<body class="bg-gray-100 font-sans px-4">

    <!-- Navbar -->
    <header class="bg-white shadow fixed top-0 left-0 w-full z-50">
        <div class="container mx-auto flex justify-between items-center px-4 py-4">
            <!-- Logo and Title -->
            <a href="{{ url('/') }}">
                <div class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('storage/' . $branch->logo) }}" alt="Logo" class="h-10 w-10 rounded-full me-4">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap">{{ $branch->name }}</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="flex space-x-4">
                <a href="{{ url('/') }}"
                    class="{{ request()->is('/') ? 'text-blue-500 font-bold' : 'text-gray-800 hover:text-blue-500' }}">
                    Home
                </a>
                <a href="{{ route('branches.about', $branch->id) }}"
                    class="{{ request()->is('branches/' . $branch->id . '/about') ? 'text-blue-500 font-bold' : 'text-gray-700 hover:bg-gray-100' }} ">
                    About
                </a>

                <!-- Branches Dropdown -->
                <div class="relative">
                    <button
                        class="text-gray-800 hover:text-blue-500 flex items-center {{ request()->is('branches*') ? 'text-blue-500 font-bold' : '' }}"
                        id="branches-menu">
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
                                    class="{{ request()->is('branches/' . $branch->id) ? 'text-blue-500 font-bold' : 'text-gray-700 hover:bg-gray-100' }} block px-4 py-2">
                                    {{ $branch->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </nav>

        </div>
    </header>



    <!-- Main Content -->
    <main class="mt-20">
        @yield('content')
    </main>

    <footer class="bottom-0 left-0 z-20  w-full p-4 bg-white rounded-lg shadow dark:bg-gray-800">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">&copy; {{ date('Y') }}
                {{ $branch->name }}. All rights reserved.
            </span>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('branches-menu');
            const dropdown = document.getElementById('branches-dropdown');

            // Show dropdown when hovering or clicking the menu button
            menuButton.addEventListener('mouseenter', () => {
                dropdown.classList.remove('hidden');
            });
            menuButton.addEventListener('mouseleave', () => {
                setTimeout(() => {
                    if (!dropdown.matches(':hover')) {
                        dropdown.classList.add('hidden');
                    }
                }, 200);
            });

            // Keep dropdown visible while interacting with it
            dropdown.addEventListener('mouseenter', () => {
                dropdown.classList.remove('hidden');
            });
            dropdown.addEventListener('mouseleave', () => {
                dropdown.classList.add('hidden');
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
