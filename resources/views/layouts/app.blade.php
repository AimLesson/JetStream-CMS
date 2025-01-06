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

<style>
    /* Ensure the mobile menu has proper spacing and appearance */
    #mobile-menu {
        background-color: white; /* Background for better visibility */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Add shadow for better distinction */
    }

    #mobile-menu a {
        padding: 12px 16px; /* Add consistent padding for links */
        display: block; /* Ensure full-width clickable area */
        border-bottom: 1px solid #e5e7eb; /* Add a separator between items */
    }

    #mobile-menu a:hover {
        background-color: #f3f4f6; /* Light gray hover background */
        color: #1d4ed8; /* Tailwind's blue-700 */
    }

    #mobile-branches-dropdown {
        margin-top: 8px; /* Space between main menu and dropdown */
        background-color: #f9fafb; /* Slightly lighter background */
        border-radius: 8px; /* Rounded corners for dropdown */
        overflow: hidden; /* Clip child elements */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    #mobile-branches-dropdown a {
        padding: 12px 16px; /* Consistent padding */
        display: block;
    }

    #mobile-branches-dropdown a:hover {
        background-color: #e5e7eb; /* Lighter hover effect */
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
                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo" class="h-10 w-auto rounded-full me-4">
                    <span class="self-center text-lg font-semibold whitespace-nowrap">{{ $profile->name }}</span>
                </div>
            </a>
    
            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-gray-800 hover:text-blue-500" id="mobile-menu-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
            <nav class="hidden absolute top-16 left-0 w-full lg:hidden mt-20" id="mobile-menu">
                <a href="{{ url('/') }}" class="text-gray-800 hover:bg-gray-100">Home</a>
                <a href="{{ url('/about') }}" class="text-gray-800 hover:bg-gray-100">About</a>
                <div>
                    <button class="flex items-center justify-between w-full px-4 py-2 text-gray-800 hover:bg-gray-100" id="mobile-branches-menu">
                        Sekolah
                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="hidden bg-gray-50" id="mobile-branches-dropdown">
                        @foreach ($branches as $branch)
                            <a href="{{ route('branches.show', $branch->id) }}" class="text-gray-800 hover:bg-gray-200">
                                {{ $branch->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </nav>
            
        </div>
    </header>



    <!-- Main Content -->
    <main class="container mx-auto mt-20 mb-20">
        @yield('content')
    </main>

    <footer class="bottom-0 left-0 z-20  w-full p-4 bg-white rounded-lg shadow">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">&copy; {{ date('Y') }} {{ $profile->name }}. All rights reserved.
            </span>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Mobile branches dropdown toggle
            const mobileBranchesMenu = document.getElementById('mobile-branches-menu');
            const mobileBranchesDropdown = document.getElementById('mobile-branches-dropdown');
            mobileBranchesMenu.addEventListener('click', () => {
                mobileBranchesDropdown.classList.toggle('hidden');
            });
    
            // Desktop dropdown
            const branchesMenu = document.getElementById('branches-menu');
            const branchesDropdown = document.getElementById('branches-dropdown');
            branchesMenu.addEventListener('mouseenter', () => {
                branchesDropdown.classList.remove('hidden');
            });
            branchesMenu.addEventListener('mouseleave', () => {
                setTimeout(() => {
                    if (!branchesDropdown.matches(':hover')) {
                        branchesDropdown.classList.add('hidden');
                    }
                }, 200);
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainContent = document.querySelector('main');

            // Add the animation class on page load
            mainContent.classList.add('content-reveal');

            // Optionally, reapply the animation on navigation
            document.addEventListener('turbo:load', () => { // Replace 'turbo:load' with appropriate event if using another framework
                mainContent.classList.remove('content-reveal');
                // Trigger reflow to restart the animation
                void mainContent.offsetWidth; 
                mainContent.classList.add('content-reveal');
            });
        });
    </script>



</body>

</html>
