<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <x-seo-meta :title="$title ?? config('app.name')"
                :description="$description ?? 'Website resmi Desa Dukuh Agung yang menyediakan informasi tentang desa, kegiatan, berita, dan layanan masyarakat.'"
                :keywords="$keywords ?? 'desa dukuhagung, website desa dukuhagung, pemerintah desa dukuhagung, berita desa dukuhagung, layanan desa dukuhagung'"
                :ogImage="$ogImage ?? null"
                :canonicalUrl="$canonicalUrl ?? null" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

    <style>
        .nav-link {
            position: relative;
            padding-bottom: 0.25rem;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #0d9488; /* Warna teal-600 */
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease-out;
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
    </style>
    @stack('styles')
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
        @include('layouts.public-navigation')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        @include('layouts.public-footer')
    </div>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>

    @stack('scripts')
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const navbar = document.getElementById('navbar');
                const mobileMenuButton = document.getElementById('mobile-menu-button');
                const mobileMenu = document.getElementById('mobile-menu');
                const hamburgerIcon = mobileMenuButton.querySelector('.hamburger-icon');
                const closeIcon = mobileMenuButton.querySelector('.close-icon');

                // Efek Shadow saat Scroll
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 50) {
                        navbar.classList.add('shadow-md', 'bg-white');
                        navbar.classList.remove('bg-white/80', 'backdrop-blur-sm');
                    } else {
                        navbar.classList.remove('shadow-md', 'bg-white');
                        navbar.classList.add('bg-white/80', 'backdrop-blur-sm');
                    }
                });

                // Logika Toggle Menu Mobile
                mobileMenuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                    setTimeout(() => {
                        mobileMenu.classList.toggle('-translate-y-4');
                        mobileMenu.classList.toggle('opacity-0');
                        mobileMenu.classList.toggle('translate-y-0');
                        mobileMenu.classList.toggle('opacity-100');
                    }, 10);
                    hamburgerIcon.classList.toggle('hidden');
                    closeIcon.classList.toggle('hidden');
                });
            });
        </script>
    @endpush
</body>
</html>
