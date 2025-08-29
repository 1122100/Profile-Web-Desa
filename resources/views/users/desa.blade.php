@extends('layouts.public')
@section('content')
    <!-- Hero Section -->
<!-- Hero Section dengan Background Gambar -->
<section class="relative pt-24 pb-0 md:pt-32 md:pb-0 bg-gradient-to-r from-green-700 to-blue-600 text-white overflow-hidden z-20"
    style="background-image: url('{{ Vite::asset('resources/img/asta_8.jpg') }}'); background-size: cover; background-position: center;">

    <!-- Overlay gelap -->
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl">
            @php
                $desa = \App\Models\Desa::first();
            @endphp

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6" data-aos="fade-up">
                    {{ $desa->nama ?? 'Desa Dukuh Agung' }}
                </h1>
                <p class="text-xl md:text-2xl text-white/90 mb-8" data-aos="fade-up" data-aos-delay="100">
                    Profil Lengkap Desa
                </p>
            </div>
        </div>
        <div class="-mt-16 relative z-10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#ffffff" fill-opacity="1" d="
                  M0,224
                  C360,320 1080,128 1440,224
                  L1440,320
                  L0,320
                  Z">
                </path>
            </svg>
        </div>
    </section>

    <!-- Desa Profile Section -->
    <section id="profile" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div class="flex flex-col md:flex-row items-start gap-12">
                    <div class="w-full md:w-1/2" data-aos="fade-right">
                        <div class="sticky top-24">
                            <div class="relative mb-8 rounded-2xl overflow-hidden shadow-xl">
                                @if($desa && $desa->foto)
                                    <img src="{{ asset('storage/' . $desa->foto) }}" alt="{{ $desa->nama }}" class="w-full h-auto">
                                @else
                                    <img src="https://images.unsplash.com/photo-1596392927852-2a18c336fb78?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Desa" class="w-full h-auto">
                                @endif
                            </div>

                            <div class="bg-gray-50 rounded-xl p-6 shadow-md">
                                <h3 class="text-xl font-semibold text-gray-800 mb-4">Informasi Umum</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-600">Tahun Berdiri</span>
                                        <span class="font-medium text-gray-800">{{ $desa->tahun_berdiri ?? '1945' }}</span>
                                    </div>
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                        <span class="text-gray-600">Luas Wilayah</span>
                                        <span class="font-medium text-gray-800">{{ $desa->luas_wilayah ?? '0' }} Ha</span>
                                    </div>
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                        <span class="text-gray-600">Kecamatan</span>
                                        <span class="font-medium text-gray-800">{{ $desa->kecamatan ?? 'Tidak ada data' }}</span>
                                    </div>
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                        <span class="text-gray-600">Kabupaten</span>
                                        <span class="font-medium text-gray-800">{{ $desa->kabupaten ?? 'Tidak ada data' }}</span>
                                    </div>
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                        <span class="text-gray-600">Provinsi</span>
                                        <span class="font-medium text-gray-800">{{ $desa->provinsi ?? 'Tidak ada data' }}</span>
                                    </div>
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                        <span class="text-gray-600">Kepala Desa</span>
                                        <span class="font-medium text-gray-800">{{ $desa->kepala_desa ?? 'Tidak ada data' }}</span>
                                    </div>
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                        <span class="text-gray-600">Kode Pos</span>
                                        <span class="font-medium text-gray-800">{{ $desa->kode_pos ?? 'Tidak ada data' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2" data-aos="fade-left">
                        <div class="prose prose-lg max-w-none">
                            <h2 class="text-3xl font-bold text-gray-800 mb-6">Tentang {{ $desa->nama ?? 'Desa Dukuh Agung' }}</h2>
                            <div class="w-20 h-1 bg-green-600 mb-6 rounded"></div>

                            <p class="text-gray-600 mb-6">
                                {{ $desa->deskripsi ?? 'Desa ini merupakan salah satu desa yang terletak di Kecamatan ' . ($desa->kecamatan ?? 'Contoh') . ', Kabupaten ' . ($desa->kabupaten ?? 'Contoh') . '. Desa ini memiliki luas wilayah sekitar ' . ($desa->luas_wilayah ?? '500') . ' hektar.' }}
                            </p>

                            <h3 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">Visi</h3>
                            <p class="text-gray-600 mb-6">
                                {{ $desa->visi ?? 'Mewujudkan Desa yang maju, mandiri, dan sejahtera.' }}
                            </p>

                            <h3 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">Misi</h3>
                            <p class="text-gray-600 mb-6">
                                {{ $desa->misi ?? 'Meningkatkan kualitas hidup masyarakat melalui pembangunan berkelanjutan dan pemberdayaan ekonomi lokal.' }}
                            </p>

                            <h3 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">Sejarah</h3>
                            <p class="text-gray-600 mb-6">
                                {{ $desa->sejarah ?? 'Desa ini memiliki sejarah panjang yang dimulai sejak tahun ' . ($desa->tahun_berdiri ?? '1945') . '. Desa ini telah mengalami berbagai perkembangan dan perubahan seiring dengan perkembangan zaman. Masyarakat desa telah berjuang bersama untuk membangun dan mengembangkan desa menjadi lebih baik.' }}
                            </p>

                            <h3 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">Geografis</h3>
                            <p class="text-gray-600 mb-6">
                                {{ $desa->geografis ?? 'Desa ini terletak di dataran ' . (rand(0,1) ? 'tinggi' : 'rendah') . ' dengan ketinggian sekitar ' . rand(100, 500) . ' meter di atas permukaan laut. Desa ini memiliki iklim yang ' . (rand(0,1) ? 'sejuk' : 'tropis') . ' dengan curah hujan rata-rata ' . rand(1000, 3000) . ' mm per tahun.' }}
                            </p>

                            <h3 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">Demografi</h3>
                            <p class="text-gray-600 mb-6">
                                {{ $desa->demografi ?? 'Desa ini memiliki jumlah penduduk sekitar ' . rand(1000, 5000) . ' jiwa yang terdiri dari ' . rand(300, 1000) . ' kepala keluarga. Mayoritas penduduk desa bekerja sebagai petani, peternak, dan pedagang.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dusun Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Dusun di {{ $desa->nama ?? 'Desa Dukuh Agung' }}</h2>
                <div class="w-24 h-1 bg-green-600 mx-auto mb-6 rounded"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    {{ $desa->nama ?? 'Desa Dukuh Agung' }} terbagi menjadi beberapa dusun yang memiliki karakteristik dan potensi masing-masing.
                </p>
            </div>

            @php
                $dusunList = \App\Models\Dusun::all();
            @endphp

            @forelse($dusunList as $dusun)
                <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-md overflow-hidden mb-8" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="md:flex">
                        <div class="md:w-1/3">
                            <div class="h-64 md:h-full overflow-hidden">
                                @if($dusun->foto)
                                    <img src="{{ asset('storage/' . $dusun->foto) }}" alt="{{ $dusun->nama }}" class="w-full h-full object-cover">
                                @else
                                    <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="{{ $dusun->nama }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                        </div>
                        <div class="p-8 md:w-2/3">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-2xl font-bold text-gray-800">{{ $dusun->nama }}</h3>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Dusun</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span>{{ $dusun->jumlah_penduduk ?? '0' }} Penduduk</span>
                            </div>
                            <p class="text-gray-600 mb-6">{{ $dusun->deskripsi ?? 'Dusun ini memiliki potensi di bidang pertanian dan peternakan.' }}</p>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <div class="flex-shrink-0 mr-3">
                                        <div class="w-10 h-10 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500">Luas Wilayah</h4>
                                        <p class="text-gray-800">{{ $dusun->luas_wilayah ?? '0' }} Ha</p>
                                    </div>
                                </div>

                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <div class="flex-shrink-0 mr-3">
                                        <div class="w-10 h-10 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500">Kepala Dusun</h4>
                                        <p class="text-gray-800">{{ $dusun->kepala_dusun ?? 'Tidak ada data' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 pt-4">
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">Potensi Dusun</h4>
                                <p class="text-gray-600">{{ $dusun->potensi ?? 'Dusun ini memiliki potensi di bidang pertanian, peternakan, dan kerajinan tangan yang dapat dikembangkan untuk meningkatkan kesejahteraan masyarakat.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-8 text-center">
                    <p class="text-gray-500">Belum ada data dusun yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-green-700 to-emerald-600 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-6">Ingin Mengetahui Lebih Banyak?</h2>
                <p class="text-lg text-white/90 mb-8">
                    Jelajahi informasi lebih lanjut tentang potensi desa kami di bidang pertanian, peternakan, UMKM, dan lembaga desa.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('informasi') }}" class="px-6 py-3 bg-white text-green-700 rounded-lg font-medium hover:bg-gray-100 transition duration-300">
                        Lihat Informasi Desa
                    </a>
                    <a href="{{ route('kontak.index') }}" class="px-6 py-3 bg-transparent border border-white text-white rounded-lg font-medium hover:bg-white/10 transition duration-300">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Top Button -->
    <button id="backToTop" class="hidden fixed right-6 bottom-6 z-50 p-3 rounded-full shadow-lg bg-white/90 hover:bg-white transition" aria-label="back to top">
        <svg class="w-6 h-6 text-emerald-600" viewBox="0 0 24 24" fill="none"><path d="M5 15l7-7 7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.AOS) {
                AOS.init({
                    duration: 800,
                    easing: 'ease-in-out',
                    once: true,
                });
            }

            // Back to top button
            const backToTop = document.getElementById('backToTop');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 500) backToTop.classList.remove('hidden');
                else backToTop.classList.add('hidden');
            });
            backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
        });
    </script>
@endpush