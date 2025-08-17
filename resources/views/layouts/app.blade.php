<!-- layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }"
      x-init="$watch('darkMode', value => localStorage.setItem('theme', value ? 'dark' : 'light')); if(darkMode) document.documentElement.classList.add('dark'); else document.documentElement.classList.remove('dark');"
      class="scroll-smooth antialiased"
>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bersahaja') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/bersahaja_logo.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white transition-colors duration-300">
    <div class="min-h-screen">

        {{-- Navbar --}}
        <nav class="bg-white dark:bg-gray-800 shadow w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">

                    {{-- Left: Logo or navigation --}}
                    <div class="flex items-center">
                        <span class="text-lg font-bold text-gray-800 dark:text-white">Bersahaja</span>
                    </div>

                    {{-- Right: Navigation + Theme Toggle --}}
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            <livewire:layout.navigation />
                        @endif

                        {{-- Toggle Button --}}
                        <button @click="darkMode = !darkMode"
                                class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 transition"
                                :title="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'">
                            <template x-if="!darkMode">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8.66-4.66l-.7.7m-12.02 0l-.7-.7M4 12H3m18 0h1m-4.66-4.66l.7-.7m-12.02 0l-.7.7M12 5a7 7 0 100 14 7 7 0 000-14z" />
                                </svg>
                            </template>
                            <template x-if="darkMode">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M17.293 13.293a8 8 0 01-11.586-11.586 8.001 8.001 0 1011.586 11.586z"/>
                                </svg>
                            </template>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        {{-- Content --}}
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>

