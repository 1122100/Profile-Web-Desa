<!-- Navbar -->
<nav id="navbar" class="navbar-fixed bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 md:h-20">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('icons/logo.png') }}" alt="Logo Desa" class="h-8 w-8 object-contain">
                    <span class="text-xl md:text-2xl font-bold bg-gradient-to-r from-teal-600 to-yellow-300 bg-clip-text text-transparent">DUKUHAGUNG</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="nav-link text-gray-700 hover:text-green-700 font-medium {{ request()->routeIs('home') ? 'active text-green-700' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('desa') }}" class="nav-link text-gray-700 hover:text-green-700 font-medium {{ request()->routeIs('desa') ? 'active text-green-700' : '' }}">
                    Desa
                </a>
                <a href="{{ route('informasi') }}" class="nav-link text-gray-700 hover:text-green-700 font-medium {{ request()->routeIs('informasi') ? 'active text-green-700' : '' }}">
                    Informasi
                </a>
                <a href="{{ route('berita') }}" class="nav-link text-gray-700 hover:text-green-700 font-medium {{ request()->routeIs('berita') ? 'active text-green-700' : '' }}">
                    Berita
                </a>
                <a href="{{ route('kontak.index') }}" class="nav-link text-gray-700 hover:text-green-700 font-medium {{ request()->routeIs('kontak') ? 'active text-green-700' : '' }}">
                    Kontak
                </a>
            </div>

            <!-- Mobile Navigation Button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-500 focus:outline-none" aria-label="Toggle menu">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-lg">
        <div class="container mx-auto px-4 py-3 space-y-1">
            <a href="{{ route('home') }}" class="block py-2 px-3 rounded-md {{ request()->routeIs('home') ? 'bg-green-50 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-700' }}">
                Beranda
            </a>
            <a href="{{ route('desa') }}" class="block py-2 px-3 rounded-md {{ request()->routeIs('desa') ? 'bg-green-50 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-700' }}">
                Desa
            </a>
            <a href="{{ route('informasi') }}" class="block py-2 px-3 rounded-md {{ request()->routeIs('informasi') ? 'bg-green-50 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-700' }}">
                Informasi
            </a>
            <a href="{{ route('berita') }}" class="block py-2 px-3 rounded-md {{ request()->routeIs('berita') ? 'bg-green-50 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-700' }}">
                Berita
            </a>
            <a href="{{ route('kontak.index') }}" class="block py-2 px-3 rounded-md {{ request()->routeIs('kontak') ? 'bg-green-50 text-green-700' : 'text-gray-700 hover:bg-green-50 hover:text-green-700' }}">
                Kontak
            </a>
        </div>
    </div>
</nav>