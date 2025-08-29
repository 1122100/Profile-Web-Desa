<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.desa.index')" :active="request()->routeIs('admin.desa.*')">
                        {{ __('Desa') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.dusun.index')" :active="request()->routeIs('admin.dusun.*')">
                        {{ __('Dusun') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.pertanian.index')" :active="request()->routeIs('admin.pertanian.*')">
                        {{ __('Pertanian') }}
                    </x-nav-link>
                    {{-- <x-nav-link :href="route('admin.peternakan.index')" :active="request()->routeIs('admin.peternakan.*')">
                        {{ __('Peternakan') }}
                    </x-nav-link> --}}
                    <x-nav-link :href="route('admin.lembaga.index')" :active="request()->routeIs('admin.lembaga.*')">
                        {{ __('Lembaga') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.umkm.index')" :active="request()->routeIs('admin.umkm.*')">
                        {{ __('UMKM') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.kontak.index')" :active="request()->routeIs('admin.kontak.*')">
                        {{ __('kontak') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.berita.index')" :active="request()->routeIs('admin.berita.*')">
                        {{ __('berita') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            <!-- Mobile Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-200 focus:outline-none transition">
                    <svg :class="{'hidden': open, 'block': !open}" class="h-6 w-6 block transition-transform duration-300 transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg :class="{'block': open, 'hidden': !open}" class="h-6 w-6 hidden transition-transform duration-300 transform rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="sm:hidden bg-gray-50 border-t border-gray-200 transition-all duration-300 ease-in-out">
        <div class="px-4 pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">Dashboard</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.desa.index')" :active="request()->routeIs('admin.desa.*')">Dusun</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.dusun.index')" :active="request()->routeIs('admin.dusun.*')">Dusun</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.pertanian.index')" :active="request()->routeIs('admin.pertanian.*')">Pertanian</x-responsive-nav-link>
            {{-- <x-responsive-nav-link :href="route('admin.peternakan.index')" :active="request()->routeIs('admin.peternakan.*')">Peternakan</x-responsive-nav-link> --}}
            <x-responsive-nav-link :href="route('admin.umkm.index')" :active="request()->routeIs('admin.umkm.*')">UMKM</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.kontak.index')" :active="request()->routeIs('admin.kontak.*')">Kontak</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.berita.index')" :active="request()->routeIs('admin.berita.*')">Berita</x-responsive-nav-link>
        </div>
        <div class="border-t border-gray-200 px-4 py-3">
            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    Log Out
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>
