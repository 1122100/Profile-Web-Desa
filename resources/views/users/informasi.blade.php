@extends('layouts.public')

@section('content')
<!-- Hero Section dengan Background Gambar -->
<section class="relative pt-24 pb-0 md:pt-32 md:pb-0 bg-gradient-to-r from-green-700 to-blue-600 text-white overflow-hidden z-20"
    style="background-image: url('{{ Vite::asset('resources/img/heroinformasi.jpg') }}'); background-size: cover; background-position: center;">

    <!-- Overlay gelap -->
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            @php
                $desa = \App\Models\Desa::first();
            @endphp

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6" data-aos="fade-up">
                Selamat Datang <br> Di Halaman Informasi Pertanian dan UMKM lokal
            </h1>
            <p class="text-lg md:text-xl text-white/90 mb-8" data-aos="fade-up" data-aos-delay="100">
                {{ $desa->deskripsi ?? 'Temukan potensi pertanian, UMKM, dan budaya lokal yang menjadi kebanggaan desa kami.' }}
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

<!-- Navigation Tabs -->
<section class="py-6 bg-white border-b">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#pertanian" class="px-5 py-2 bg-gray-100 text-green-700 rounded-lg font-medium hover:bg-green-50 transition duration-300">
                Pertanian
            </a>
            <a href="#umkm" class="px-5 py-2 bg-gray-100 text-green-700 rounded-lg font-medium hover:bg-green-50 transition duration-300">
                UMKM
            </a>
        </div>
    </div>
</section>

<!-- Pertanian Section -->
<section id="pertanian" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Potensi Pertanian</h2>
                <div class="w-20 h-1 bg-green-600 mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Pertanian menjadi sektor utama yang menopang perekonomian desa kami.
                </p>
            </div>

            @php
                $pertanian = \App\Models\Pertanian::all();
                $totalLahan = $pertanian->sum('luas_lahan');
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center mb-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Gambaran Umum</h3>
                    <p class="text-gray-600 mb-6">
                        Sektor pertanian di desa kami memiliki luas lahan sekitar <span class="font-semibold text-green-700">{{ $totalLahan ?? '500' }} Ha</span> dengan total produksi mencapai <span class="font-semibold text-green-700">{{ $totalProduksi ?? '1000' }} Ton</span> per tahun.
                    </p>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                            <h4 class="text-sm font-medium text-gray-500">Luas Lahan</h4>
                            <p class="text-xl font-semibold text-gray-800">{{ $totalLahan ?? '500' }} Ha</p>
                        </div>
                    </div>

                    <h4 class="text-lg font-semibold text-gray-800 mb-3">Jenis Tanaman Utama:</h4>
                    <ul class="space-y-2 text-gray-600">
                        @forelse($pertanian->pluck('jenis_tanaman')->unique() as $tanaman)
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                {{ $tanaman }}
                            </li>
                        @empty
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Padi
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Jagung
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Kedelai
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Pertanian" class="w-full h-auto rounded-xl shadow-lg">
                </div>
            </div>

            <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Data Pertanian</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Tanaman</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Luas Lahan (Ha)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Musim Tanam</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($pertanian as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $item->jenis_tanaman }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $item->luas_lahan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $item->musim_tanam ?? 'Sepanjang tahun' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-600">Belum ada data pertanian yang tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- UMKM Section -->
<section id="umkm" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">UMKM Desa</h2>
                <div class="w-20 h-1 bg-green-600 mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Usaha Mikro, Kecil, dan Menengah yang berkembang di desa kami menjadi penggerak ekonomi lokal.
                </p>
            </div>

            @php
                $umkm = \App\Models\UMKM::all();
            @endphp

            <!-- UMKM Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Total UMKM</h3>
                    <p class="text-3xl font-bold text-gray-800">{{ $umkm->count() }}</p>
                    <p class="text-gray-600 mt-2">Usaha terdaftar</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Tenaga Kerja</h3>
                    <p class="text-3xl font-bold text-gray-800">{{ $umkm->sum('jumlah_karyawan') }}</p>
                    <p class="text-gray-600 mt-2">Orang terserap</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Jenis Usaha</h3>
                    <p class="text-3xl font-bold text-gray-800">{{ $umkm->pluck('jenis_usaha')->unique()->count() }}</p>
                    <p class="text-gray-600 mt-2">Kategori berbeda</p>
                </div>
            </div>

            <!-- UMKM Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @forelse($umkm as $item)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_usaha }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-3">
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs">{{ $item->jenis_usaha }}</span>
                                <span class="text-sm text-gray-500">Est. {{ $item->tahun_berdiri ?? '-' }}</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $item->nama_usaha }}</h3>
                            <p class="text-gray-600 mb-3 text-sm line-clamp-2">{{ $item->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                            <div class="flex items-center text-gray-500 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                {{ $item->jumlah_karyawan }} Karyawan
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p class="text-gray-600">Belum ada data UMKM yang tersedia</p>
                    </div>
                @endforelse
            </div>

            <!-- UMKM Distribution -->
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Sebaran UMKM</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Jenis Usaha</h4>
                        <div class="space-y-3">
                            @php
                                $jenis_usaha = $umkm->groupBy('jenis_usaha');
                                $total_umkm = $umkm->count();
                            @endphp

                            @forelse($jenis_usaha as $jenis => $items)
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-gray-700">{{ $jenis }}</span>
                                        <span class="text-gray-600">{{ $items->count() }} ({{ $total_umkm > 0 ? round(($items->count() / $total_umkm) * 100) : 0 }}%)</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-600 h-2 rounded-full" style="width: {{ $total_umkm > 0 ? ($items->count() / $total_umkm) * 100 : 0 }}%"></div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-600">Tidak ada data jenis usaha</p>
                            @endforelse
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Sebaran Per Dusun</h4>
                        <div class="space-y-3">
                            @php
                                $dusun_umkm = $umkm->groupBy('dusun_id');
                                $dusuns = \App\Models\Dusun::all();
                            @endphp

                            @forelse($dusuns as $dusun)
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-gray-700">{{ $dusun->nama_dusun }}</span>
                                        <span class="text-gray-600">
                                            {{ isset($dusun_umkm[$dusun->id]) ? $dusun_umkm[$dusun->id]->count() : 0 }}
                                            ({{ $total_umkm > 0 ? round((isset($dusun_umkm[$dusun->id]) ? $dusun_umkm[$dusun->id]->count() : 0) / $total_umkm * 100) : 0 }}%)
                                        </span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-600 h-2 rounded-full" style="width: {{ $total_umkm > 0 ? ((isset($dusun_umkm[$dusun->id]) ? $dusun_umkm[$dusun->id]->count() : 0) / $total_umkm) * 100 : 0 }}%"></div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-600">Tidak ada data dusun.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Lembaga Section -->
<section id="lembaga" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Lembaga Desa</h2>
                <div class="w-20 h-1 bg-green-600 mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Lembaga yang berperan dalam pembangunan dan pemberdayaan masyarakat desa.
                </p>
            </div>

            @php
                $lembaga = \App\Models\Lembaga::all();
            @endphp

            <!-- Lembaga Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @forelse($lembaga as $item)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition duration-300">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_lembaga }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        @endif
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-3">
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">{{ $item->jenis_lembaga }}</span>
                                <span class="text-sm text-gray-500">Est. {{ $item->tahun_berdiri ?? '-' }}</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $item->nama_lembaga }}</h3>
                            <p class="text-gray-600 mb-3 text-sm line-clamp-2">{{ $item->deskripsi ?? 'Tidak ada deskripsi' }}</p>

                            @if($item->ketua)
                            <div class="flex items-center text-gray-500 text-sm mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Ketua: {{ $item->ketua }}
                            </div>
                            @endif

                            @if($item->alamat)
                            <div class="flex items-center text-gray-500 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $item->alamat }}
                            </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <p class="text-gray-600">Belum ada data lembaga yang tersedia</p>
                    </div>
                @endforelse
            </div>

            <!-- Lembaga Distribution -->
            <div class="bg-gray-50 p-6 rounded-xl shadow-sm">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Sebaran Lembaga</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Jenis Lembaga</h4>
                        <div class="space-y-3">
                            @php
                                $jenis_lembaga = $lembaga->groupBy('jenis_lembaga');
                                $total_lembaga = $lembaga->count();
                            @endphp

                            @forelse($jenis_lembaga as $jenis => $items)
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-gray-700">{{ $jenis }}</span>
                                        <span class="text-gray-600">{{ $items->count() }} ({{ $total_lembaga > 0 ? round(($items->count() / $total_lembaga) * 100) : 0 }}%)</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $total_lembaga > 0 ? ($items->count() / $total_lembaga) * 100 : 0 }}%"></div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-600">Tidak ada data jenis lembaga</p>
                            @endforelse
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Sebaran Per Dusun</h4>
                        <div class="space-y-3">
                            @php
                                $dusun_lembaga = $lembaga->groupBy('dusun_id');
                            @endphp

                            @forelse($dusuns as $dusun)
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-gray-700">{{ $dusun->nama_dusun }}</span>
                                        <span class="text-gray-600">
                                            {{ isset($dusun_lembaga[$dusun->id]) ? $dusun_lembaga[$dusun->id]->count() : 0 }}
                                            ({{ $total_lembaga > 0 ? round((isset($dusun_lembaga[$dusun->id]) ? $dusun_lembaga[$dusun->id]->count() : 0) / $total_lembaga * 100) : 0 }}%)
                                        </span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $total_lembaga > 0 ? ((isset($dusun_lembaga[$dusun->id]) ? $dusun_lembaga[$dusun->id]->count() : 0) / $total_lembaga) * 100 : 0 }}%"></div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-600">Tidak ada data dusun.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection