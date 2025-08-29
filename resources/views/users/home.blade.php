@extends('layouts.public')
@section('content')
    <!-- Hero Section -->
    <section class="relative pt-24 pb-0 md:pt-32 md:pb-0 bg-gradient-to-r from-teal-600 to-yellow-200 text-white overflow-hidden z-20">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                @php
                    $desa = \App\Models\Desa::first();
                @endphp

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6" data-aos="fade-up">
                    {{ $desa->nama ?? 'Desa Dukuh Agung' }}
                </h1>
                <p class="text-xl md:text-2xl text-white/90 mb-8" data-aos="fade-up" data-aos-delay="100">
                    {{ $desa->deskripsi ?? 'Desa yang maju, mandiri, dan sejahtera dengan pembangunan berkelanjutan.' }}
                </p>
                <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
                    <a href="#profile" class="px-6 py-3 bg-white text-green-700 rounded-lg font-medium hover:bg-gray-100 transition duration-300">
                        Tentang Desa
                    </a>
                    <a href="{{ route('kontak.index') }}" class="px-6 py-3 bg-transparent border border-white text-white rounded-lg font-medium hover:bg-white/10 transition duration-300">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
        <div class="-mt-16">
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
    <!-- Profile Section -->
    <section id="profile" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="w-full md:w-1/2" data-aos="fade-right">
                    <div class="relative">
                        @if($desa && $desa->foto)
                            <img src="{{ asset('storage/' . $desa->foto) }}" alt="{{ $desa->nama }}" class="w-full h-auto rounded-2xl shadow-xl">
                        @else
                            <img src="https://images.unsplash.com/photo-1596392927852-2a18c336fb78?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Desa" class="w-full h-auto rounded-2xl shadow-xl">
                        @endif
                        <div class="absolute -bottom-6 -right-6 bg-green-600 text-white px-6 py-4 rounded-lg shadow-lg">
                            <p class="text-lg font-semibold">Est. {{ $desa->tahun_berdiri ?? '1945' }}</p>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2" data-aos="fade-left">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Tentang Desa Kami</h2>
                    <div class="w-20 h-1 bg-green-600 mb-6 rounded"></div>

                    <p class="text-gray-600 mb-6">
                        {{ $desa->deskripsi ?? 'Desa ini merupakan salah satu desa yang terletak di Kecamatan ' . ($desa->kecamatan ?? 'Contoh') . ', Kabupaten ' . ($desa->kabupaten ?? 'Contoh') . '. Desa ini memiliki luas wilayah sekitar ' . ($desa->luas_wilayah ?? '500') . ' hektar.' }}
                    </p>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Visi</h3>
                        <p class="text-gray-600">
                            {{ $desa->visi ?? 'Mewujudkan Desa yang maju, mandiri, dan sejahtera.' }}
                        </p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Misi</h3>
                        <p class="text-gray-600">
                            {{ $desa->misi ?? 'Meningkatkan kualitas hidup masyarakat melalui pembangunan berkelanjutan dan pemberdayaan ekonomi lokal.' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Luas Wilayah</h4>
                                <p class="text-lg font-semibold text-gray-800">{{ $desa->luas_wilayah ?? '500' }} Ha</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Kepala Desa</h4>
                                <p class="text-lg font-semibold text-gray-800">{{ $desa->kepala_desa ?? 'Bapak Suparman' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Kecamatan</h4>
                                <p class="text-lg font-semibold text-gray-800">{{ $desa->kecamatan ?? 'Contoh' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-medium text-gray-500">Email</h4>
                                <p class="text-lg font-semibold text-gray-800 truncate">{{ $desa->email ?? 'info@dukuhagung.desa.id' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @php
                    $dusunCount = \App\Models\Dusun::count();
                    $lembagaCount = \App\Models\Lembaga::count();
                    $pertanianCount = \App\Models\Pertanian::count();
                    $UmkmCount = \App\Models\UMKM::count();
                @endphp

                <div class="bg-white p-6 rounded-xl shadow-md text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-1">{{ $dusunCount ?: 0 }}</h3>
                    <p class="text-gray-500">Dusun</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-1">{{ $lembagaCount ?: 0 }}</h3>
                    <p class="text-gray-500">Lembaga</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-1">{{ $pertanianCount ?: 0 }}</h3>
                    <p class="text-gray-500">Pertanian</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-1">{{ $UmkmCount ?: 0 }}</h3>
                    <p class="text-gray-500">UMKM</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Dusun Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Dusun</h2>
                <div class="w-24 h-1 bg-green-600 mx-auto mb-6 rounded"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">{{ $desa->nama ?? 'Desa Dukuh Agung' }} terbagi menjadi beberapa dusun yang memiliki karakteristik dan potensi masing-masing.</p>
            </div>

            @php
                $dusunList = \App\Models\Dusun::all();
                $row1 = $dusunList->take(2);
                $row2 = $dusunList->skip(2)->take(3);
            @endphp

            @if($dusunList->isEmpty())
                <div class="text-center py-8">
                    <p class="text-gray-500">Belum ada data dusun yang tersedia.</p>
                </div>
            @else
                <div class="flex flex-col items-center gap-8">
                    <div class="flex flex-wrap justify-center gap-6 w-full md:w-4/5 lg:w-3/4">
                        @foreach($row1 as $dusun)
                            <!-- Kartu Dusun -->
                            <div class="w-full sm:w-2/5 flex-grow max-w-md bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                                <div class="h-48 overflow-hidden">
                                    @if($dusun->foto)
                                        <img src="{{ asset('storage/' . $dusun->foto) }}" alt="{{ $dusun->nama }}" class="w-full h-full object-cover transition duration-500 hover:scale-110">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="{{ $dusun->nama }}" class="w-full h-full object-cover transition duration-500 hover:scale-110">
                                    @endif
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $dusun->nama }}</h3>
                                    <p class="text-gray-600 mb-4 h-20 overflow-hidden">{{ $dusun->deskripsi ?? 'Dusun ini memiliki potensi di bidang pertanian dan peternakan.' }}</p>
                                    <div class="flex items-center text-sm text-gray-500 mt-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0019 16v1h-6.07zM6 11a5 5 0 00-4.58 3.03A6.97 6.97 0 001 16v1h6v-2a7.006 7.006 0 00-1-3.97z" />
                                        </svg>
                                        <span>{{ $dusun->jumlah_penduduk ?? '0' }} Penduduk</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Baris 2: 3 Kartu -->
                    @if(count($row2) > 0)
                    <div class="flex flex-wrap justify-center gap-6 w-full">
                        @foreach($row2 as $dusun)
                            <!-- Kartu Dusun -->
                            <div class="w-full sm:w-2/5 lg:w-[30%] flex-grow max-w-md bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300" data-aos="fade-up" data-aos-delay="{{ ($loop->iteration + 2) * 100 }}">
                                <div class="h-48 overflow-hidden">
                                    @if($dusun->foto)
                                        <img src="{{ asset('storage/' . $dusun->foto) }}" alt="{{ $dusun->nama }}" class="w-full h-full object-cover transition duration-500 hover:scale-110">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="{{ $dusun->nama }}" class="w-full h-full object-cover transition duration-500 hover:scale-110">
                                    @endif
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $dusun->nama }}</h3>
                                    <p class="text-gray-600 mb-4 h-20 overflow-hidden">{{ $dusun->deskripsi ?? 'Dusun ini memiliki potensi di bidang pertanian dan peternakan.' }}</p>
                                    <div class="flex items-center text-sm text-gray-500 mt-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0019 16v1h-6.07zM6 11a5 5 0 00-4.58 3.03A6.97 6.97 0 001 16v1h6v-2a7.006 7.006 0 00-1-3.97z" />
                                        </svg>
                                        <span>{{ $dusun->jumlah_penduduk ?? '0' }} Penduduk</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            @endif

            @if(count($dusunList) > 5)
                <div class="text-center mt-12" data-aos="fade-up">
                    <a href="{{ route('dusun') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-white border border-green-600 text-green-600 font-medium hover:bg-green-50 transition duration-300">
                        <span>Lihat Semua Dusun</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Potensi Desa Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Potensi Desa</h2>
                <div class="w-24 h-1 bg-green-600 mx-auto mb-6 rounded"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">{{ $desa->nama ?? 'Desa Dukuh Agung' }} memiliki berbagai potensi yang dapat dikembangkan untuk meningkatkan kesejahteraan masyarakat.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 justify-items-center">
                <!-- Pertanian -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    <div class="h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Pertanian" class="w-full h-full object-cover transition duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Unggulan</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Pertanian</h3>

                        @php
                            $pertanian = \App\Models\Pertanian::all();
                            $totalLahan = $pertanian->sum('luas_lahan');
                            $jenisTanaman = $pertanian->pluck('jenis_tanaman')->unique()->take(3)->implode(', ');
                        @endphp

                        <p class="text-gray-600 mb-4">
                            Sektor pertanian merupakan salah satu potensi utama dengan lahan seluas {{ $totalLahan ?? '0' }} Ha.
                            @if($jenisTanaman)
                                Tanaman utama: {{ $jenisTanaman }}.
                            @endif
                        </p>
                        <a href="{{ route('informasi') }}" class="inline-flex items-center gap-2 text-green-600 hover:text-green-700 font-medium transition">
                            Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- UMKM -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                    <div class="h-56 overflow-hidden">
                        <img src="{{ Vite::asset('resources/img/umkm.jpg') }}" alt="UMKM" class="w-full h-full object-cover transition duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Potensial</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">UMKM</h3>
                        <p class="text-gray-600 mb-4">
                            Terdapat {{ $UmkmCount ?: 0 }} UMKM yang bergerak di berbagai bidang seperti
                        </p>
                        <a href="{{ route('informasi') }}" class="inline-flex items-center gap-2 text-green-600 hover:text-green-700 font-medium transition">
                            Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lembaga Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Lembaga Desa</h2>
            <div class="w-24 h-1 bg-green-600 mx-auto mb-6 rounded"></div>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Lembaga-lembaga yang berperan penting dalam pembangunan dan pemberdayaan masyarakat desa.
            </p>
        </div>

        @php
            $lembaga = \App\Models\Lembaga::take(6)->get();
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($lembaga as $item)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">

                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_lembaga }}" class="w-full h-48 object-cover">
                    @endif

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                {{ $item->jenis_lembaga }}
                            </span>
                            <span class="text-sm text-gray-500">
                                Est. {{ $item->tahun_berdiri ?? '-' }}
                            </span>
                        </div>

                        <h3 class="text-xl font-semibold text-gray-800 mb-2">
                            {{ $item->nama_lembaga }}
                        </h3>

                        <div class="border-t pt-4 space-y-2">
                            <div class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2 mt-0.5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <p class="text-sm text-gray-500">Lokasi:</p>
                                    <p class="text-gray-700">{{ $item->alamat_detail ?? 'Tidak ada alamat' }}</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2 mt-0.5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-3">Belum ada data lembaga.</p>
            @endforelse
        </div>
            <div class="text-center mt-10" data-aos="fade-up">
                <a href="{{ route('informasi') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-white border border-green-600 text-green-600 font-medium hover:bg-green-50 transition duration-300">
                    <span>Lihat Semua Lembaga</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div data-aos="fade-right">
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">Hubungi Kami</h2>
                        <div class="w-20 h-1 bg-green-600 mb-6 rounded"></div>
                        <p class="text-gray-600 mb-8">
                            Jika Anda memiliki pertanyaan atau ingin mendapatkan informasi lebih lanjut tentang {{ $desa->nama ?? 'Desa Dukuh Agung' }}, silakan hubungi kami melalui kontak berikut:
                        </p>

                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">Alamat</h4>
                                    <p class="text-gray-600">{{ $desa->alamat ?? 'Jl. Desa No. 123, Dukuh Agung' }}</p>
                                    <p class="text-gray-600">{{ $desa->kecamatan ?? 'Kecamatan' }}, {{ $desa->kabupaten ?? 'Kabupaten' }}, {{ $desa->provinsi ?? 'Provinsi' }} {{ $desa->kode_pos ?? '' }}</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">Email</h4>
                                    <p class="text-gray-600">{{ $desa->email ?? 'info@dukuhagung.desa.id' }}</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">Telepon</h4>
                                    <p class="text-gray-600">{{ $desa->telepon ?? '082141051597' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-md" data-aos="fade-left">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Kirim Pesan</h3>
                        <form action="{{ route('kontak.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 mb-2">Nama</label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                            </div>
                            <div class="mb-4">
                                <label for="subject" class="block text-gray-700 mb-2">Subjek</label>
                                <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="block text-gray-700 mb-2">Pesan</label>
                                <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required></textarea>
                            </div>
                            <button type="submit" class="w-full py-2 px-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-green-700 to-emerald-600 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-6">Ingin Berpartisipasi dalam Pembangunan Desa?</h2>
                <p class="text-lg text-white/90 mb-8">
                    Mari bergabung dan berkontribusi dalam berbagai kegiatan untuk memajukan {{ $desa->nama ?? 'Desa Dukuh Agung' }}.
                    Bersama-sama kita wujudkan desa yang lebih baik.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('kontak.index') }}" class="px-6 py-3 bg-white text-green-700 rounded-lg font-medium hover:bg-gray-100 transition duration-300">
                        Hubungi Kami
                    </a>
                    <a href="{{ route('informasi') }}" class="px-6 py-3 bg-transparent border border-white text-white rounded-lg font-medium hover:bg-white/10 transition duration-300">
                        Pelajari Lebih Lanjut
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
    <!-- AOS init (make sure AOS is included in your layout) -->
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
