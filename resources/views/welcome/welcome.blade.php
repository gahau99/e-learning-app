<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bersahaja - E-Learning Modern</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/bersahaja_logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Dark mode toggle
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 transition-colors duration-300">

    {{-- Navigation --}}
    @include('livewire.layout.navigation')

    <!-- Hero -->
    <section class="flex flex-col items-start justify-center text-left px-8 py-20 bg-gray-50 dark:bg-gray-800 bg-cover bg-center"
        style="background-image: url('{{ asset('images/web_background.JPEG') }}');">
        
        <h1 class="text-4xl sm:text-5xl font-bold mb-6">
            Belajar Lebih Mudah di 
            <span id="typing-text" class="text-green-500"></span>
        </h1>
        
        <p class="text-lg max-w-2xl mb-8">
            Platform e-learning untuk guru dan siswa dengan fitur kelas, upload tugas, dan diskusi yang efisien.
        </p>
        
        <a href="{{ route('register') }}" 
        class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-md text-lg font-semibold transition">
        Mulai Sekarang
        </a>
    </section>

    <!-- Script Animasi -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12" defer></script>
    <script>
    (function () {
        function runTyping() {
            const el = document.getElementById('typing-text');
            if (!el) return;

            if (window._typedInstance && typeof window._typedInstance.destroy === 'function') {
                window._typedInstance.destroy();
            }
            el.textContent = '';

            if (window.Typed) {
                window._typedInstance = new Typed('#typing-text', {
                    strings: ['Bersahaja'],
                    typeSpeed: 90,
                    backSpeed: 40,
                    showCursor: true,
                    cursorChar: '|',
                    loop: false,
                });
            } else {
                const text = 'Bersahaja';
                let i = 0;
                clearInterval(window._typedFallbackTimer);
                el.textContent = '';
                window._typedFallbackTimer = setInterval(() => {
                    if (i < text.length) el.textContent += text[i++]; else clearInterval(window._typedFallbackTimer);
                }, 90);
            }
        }

        function boot() {
            setTimeout(runTyping, 50);
            setInterval(runTyping, 600000);
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', boot);
        } else {
            boot();
        }
    })();
    </script>

    <!-- Fitur -->
    <section class="px-6 py-16 bg-white dark:bg-gray-900">
        <h2 class="text-3xl font-bold text-center mb-10">Fitur Utama</h2>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 max-w-6xl mx-auto">
            <div class="p-6 rounded shadow dark:shadow-gray-700 bg-gray-100 dark:bg-gray-800">
                <h3 class="text-xl font-semibold mb-2">📚 Kelas Interaktif</h3>
                <p>Buat dan gabung ke kelas sesuai minatmu. Diskusi dan belajar jadi lebih mudah.</p>
            </div>
            <div class="p-6 rounded shadow dark:shadow-gray-700 bg-gray-100 dark:bg-gray-800">
                <h3 class="text-xl font-semibold mb-2">📤 Kirim Tugas</h3>
                <p>Upload dan kumpulkan tugas dengan mudah langsung dari dashboard.</p>
            </div>
            <div class="p-6 rounded shadow dark:shadow-gray-700 bg-gray-100 dark:bg-gray-800">
                <h3 class="text-xl font-semibold mb-2">💬 Komentar </h3>
                <p>Berikan komentar dan tanya jawab langsung pada tugas atau materi.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-100 dark:bg-gray-800 py-6 text-center text-sm text-gray-600 dark:text-gray-400">
        &copy; {{ date('Y') }} Bersahaja. Semua hak dilindungi.
    </footer>

</body>
</html>
