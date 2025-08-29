<footer class="bg-gray-800 text-white pt-16 pb-6">
    <div class="container mx-auto px-4">
        <!-- Footer Top Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <!-- About Section -->
            <div>
                <h3 class="text-xl font-bold mb-4">Desa Dukuh Agung</h3>
                <p class="text-gray-300 mb-4">
                    Website resmi Desa Dukuh Agung yang menyediakan informasi tentang desa, kegiatan, berita, dan layanan masyarakat.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-4">Tautan Cepat</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="{{ route('desa') }}" class="text-gray-300 hover:text-white transition-colors">Profil Desa</a></li>
                    <li><a href="{{ route('berita') }}" class="text-gray-300 hover:text-white transition-colors">Berita</a></li>
                    <li><a href="{{ route('kontak.index') }}" class="text-gray-300 hover:text-white transition-colors">Kontak</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-xl font-bold mb-4">Layanan</h3>
                <ul class="space-y-2">
                    <li><a href="#pertanian" class="text-gray-300 hover:text-white transition-colors">Pertanian</a></li>
                    <li><a href="#umkm" class="text-gray-300 hover:text-white transition-colors">UMKM</a></li>
                    <li><a href="#lembaga" class="text-gray-300 hover:text-white transition-colors">Lembaga Desa</a></li>
                    <li><a href="{{ route('kontak.index')}}" class="text-gray-300 hover:text-white transition-colors">Pengaduan</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-xl font-bold mb-4">Kontak</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-gray-300">Desa Dukuh Agung, Kecamatan Tikung, Kabupaten Lamongan, Jawa Timur</span>
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-gray-300">(0322) 123456</span>
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-300">info@desadukuhagung.id</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Newsletter -->
        <div class="border-t border-gray-700 pt-8 pb-10">
            <div class="max-w-xl mx-auto">
                <h3 class="text-xl font-bold mb-4 text-center">Berlangganan Berita</h3>
                <p class="text-gray-300 text-center mb-4">Dapatkan informasi terbaru tentang kegiatan dan program desa</p>
                <form class="flex flex-col sm:flex-row gap-2">
                    <input type="email" placeholder="Alamat Email Anda" class="flex-1 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors">
                        Berlangganan
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="border-t border-gray-700 pt-6 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400 text-sm mb-4 md:mb-0">
                &copy; {{ date('Y') }} Desa Dukuh Agung. Hak Cipta Dilindungi.
            </p>
            <div class="flex space-x-4 text-sm text-gray-400">
                <a href="{{ route('informasi')}}" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                <a href="{{ route('informasi')}}" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                <a href="{{ route('informasi')}}" class="hover:text-white transition-colors">Peta Situs</a>
            </div>
        </div>
    </div>
</footer>