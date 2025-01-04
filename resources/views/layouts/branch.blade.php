<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'News Portal')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <header class="bg-white shadow fixed top-0 left-0 w-full z-50">
        <div class="container mx-auto flex justify-between items-center px-4 py-4">
            <!-- Logo and Title -->
            <div class="flex items-center">
                <img src="{{ asset('storage/' . $branch->logo) }}" alt="Logo" class="h-10 w-10 rounded-full">
                <span class="ml-2 font-bold text-lg">{{ $branch->name }}</span>
            </div>

            <!-- Navigation Links -->
            <nav class="flex space-x-4">
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'text-blue-500 font-bold' : 'text-gray-800 hover:text-blue-500' }}">
                    Home
                </a>
                <a href="{{ route('branches.about', $branch->id) }}" class="{{ request()->is('branches/' . $branch->id. '/about') ? 'text-blue-500 font-bold' : 'text-gray-700 hover:bg-gray-100' }} ">
                    About
                </a>
            
                <!-- Branches Dropdown -->
                <div class="relative">
                    <button class="text-gray-800 hover:text-blue-500 flex items-center {{ request()->is('branches*') ? 'text-blue-500 font-bold' : '' }}" id="branches-menu">
                        Cabang
                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute hidden bg-white shadow-lg rounded-lg mt-2 w-auto min-w-[200px] z-50" id="branches-dropdown">
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

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-8">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 text-center md:text-left">
            <div>
                <h4 class="font-bold text-lg">{{ $profile->name }}</h4>
                <p>{{ $profile->address }}</p>
                <p>{{ $profile->phone }}</p>
            </div>
            <div>
                <h4 class="font-bold text-lg">Quick Links</h4>
                <ul>
                    <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="hover:underline">About</a></li>
                    <li><a href="{{ url('/branches') }}" class="hover:underline">Branches</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-lg">Follow Us</h4>
                <ul>
                    <li><a href="#" class="hover:underline">Facebook</a></li>
                    <li><a href="#" class="hover:underline">Twitter</a></li>
                    <li><a href="#" class="hover:underline">Instagram</a></li>
                </ul>
            </div>
        </div>
        <p>&copy; {{ date('Y') }} {{ $branch->name }}. All rights reserved.</p>
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


</body>

</html>
