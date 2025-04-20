<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Sharing Platform</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Custom Tailwind Config for Fonts and Gradient -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Pacifico', 'cursive'],
                        body: ['Roboto', 'sans-serif'],
                    },
                    colors: {
                        peach: {
                            500: '#FF9A8B',
                            600: '#FF6A88',
                            700: '#FF99AC',
                        },
                    },
                    backgroundImage: {
                        'recipe-bg': "url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80')"
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-body antialiased">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-peach-500 via-peach-600 to-peach-700 shadow-xl p-4 backdrop-blur-lg bg-opacity-90">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('recipes.index') }}" class="text-white text-3xl font-heading tracking-wide hover:opacity-90 transition duration-300">
                🍲 Recipe Sharing
            </a>
            
            <!-- Navbar Links -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('recipes.index') }}" class="text-white text-lg font-medium hover:text-yellow-100 transition duration-300">Home</a>
                
                @auth
                <a href="{{ route('recipes.create') }}" class="text-white text-lg font-medium hover:text-yellow-100 transition duration-300">+ Create</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white text-lg font-medium hover:text-yellow-100 transition duration-300">Logout</button>
                </form>
                @endauth
                
                @guest
                <a href="{{ route('login') }}" class="text-white text-lg font-medium hover:text-yellow-100 transition duration-300">Login</a>
                <a href="{{ route('register') }}" class="text-white text-lg font-medium hover:text-yellow-100 transition duration-300">Register</a>
                @endguest
            </div>

            <!-- Hamburger Icon -->
            <div class="md:hidden flex items-center">
                <button id="menu-toggle" class="text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="menu-dropdown" class="hidden md:hidden bg-peach-600 text-white">
            <div class="container mx-auto px-6 py-4 space-y-3">
                <a href="{{ route('recipes.index') }}" class="text-lg block hover:text-yellow-100 transition duration-300">Home</a>
                @auth
                <a href="{{ route('recipes.create') }}" class="text-lg block hover:text-yellow-100 transition duration-300">+ Create</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-lg block hover:text-yellow-100 transition duration-300">Logout</button>
                </form>
                @endauth
                @guest
                <a href="{{ route('login') }}" class="text-lg block hover:text-yellow-100 transition duration-300">Login</a>
                <a href="{{ route('register') }}" class="text-lg block hover:text-yellow-100 transition duration-300">Register</a>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Content Container -->
    <div class="container mx-auto p-6">
        <!-- Your content goes here -->
    </div>

    <script>
        // Toggle mobile menu
        document.getElementById('menu-toggle').addEventListener('click', () => {
            document.getElementById('menu-dropdown').classList.toggle('hidden');
        });
    </script>

</body>
</html>
