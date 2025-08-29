<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">
                <!-- Dusun Stats -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Dusun</p>
                            <p class="text-2xl font-bold">{{ \App\Models\Dusun::count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Pertanian Stats -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Kelompok Tani</p>
                            <p class="text-2xl font-bold">{{ \App\Models\Pertanian::count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Lembaga Stats -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-red-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-100 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Lembaga</p>
                            <p class="text-2xl font-bold">{{ \App\Models\Lembaga::count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- UMKM Stats -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-purple-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">UMKM</p>
                            <p class="text-2xl font-bold">{{ \App\Models\UMKM::count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Berita Stats -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-amber-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-amber-100 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Berita</p>
                            <p class="text-2xl font-bold">{{ \App\Models\Berita::count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Activity -->
                <div class="lg:col-span-2">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold mb-4">Aktivitas Terbaru</h3>

                            <div class="space-y-4">
                                @php
                                    $recentPertanian = \App\Models\Pertanian::latest()->take(3)->get();
                                    // $recentPeternakan = \App\Models\Peternakan::latest()->take(3)->get();
                                    $recentLembaga = \App\Models\Lembaga::latest()->take(3)->get();
                                    $recentUMKM = \App\Models\UMKM::latest()->take(3)->get();
                                    $recentBerita = \App\Models\Berita::latest()->take(3)->get();

                                    $allRecent = collect()
                                        ->merge($recentPertanian->map(function($item) {
                                            return [
                                                'id' => $item->id,
                                                'name' => $item->nama_kelompok,
                                                'type' => 'Pertanian',
                                                'date' => $item->created_at,
                                                'route' => route('admin.pertanian.show', $item->id)
                                            ];
                                        }))
                                        // ->merge($recentPeternakan->map(function($item) {
                                        //     return [
                                        //         'id' => $item->id,
                                        //         'name' => $item->nama_kelompok,
                                        //         'type' => 'Peternakan',
                                        //         'date' => $item->created_at,
                                        //         'route' => route('admin.peternakan.show', $item->id)
                                        //     ];
                                        // }))
                                        ->merge($recentLembaga->map(function($item) {
                                            return [
                                                'id' => $item->id,
                                                'name' => $item->nama_lembaga,
                                                'type' => 'Lembaga',
                                                'date' => $item->created_at,
                                                'route' => route('admin.lembaga.show', $item->id)
                                            ];
                                        }))
                                        ->merge($recentUMKM->map(function($item) {
                                            return [
                                                'id' => $item->id,
                                                'name' => $item->nama_usaha,
                                                'type' => 'UMKM',
                                                'date' => $item->created_at,
                                                'route' => route('admin.umkm.show', $item->id)
                                            ];
                                        }))
                                        ->merge($recentBerita->map(function($item) {
                                            return [
                                                'id' => $item->id,
                                                'name' => $item->judul,
                                                'type' => 'Berita',
                                                'date' => $item->created_at,
                                                'route' => route('admin.berita.edit', $item->id)
                                            ];
                                        }))
                                        ->sortByDesc('date')
                                        ->take(5);
                                @endphp

                                @forelse($allRecent as $item)
                                    <div class="flex items-center p-3 border-l-4
                                        @if($item['type'] == 'Pertanian') border-green-500 bg-green-50
                                        {{-- @elseif($item['type'] == 'Peternakan') border-yellow-500 bg-yellow-50 --}}
                                        @elseif($item['type'] == 'Lembaga') border-red-500 bg-red-50
                                        @elseif($item['type'] == 'Berita') border-amber-500 bg-amber-50
                                        @else border-purple-500 bg-purple-50
                                        @endif rounded">
                                        <div class="flex-1">
                                            <p class="font-medium">{{ $item['name'] }}</p>
                                            <p class="text-sm text-gray-500">{{ $item['type'] }} - {{ $item['date']->diffForHumans() }}</p>
                                        </div>
                                        <a href="{{ $item['route'] }}" class="px-3 py-1 bg-white border rounded-md hover:bg-gray-50 text-sm">Lihat</a>
                                    </div>
                                @empty
                                    <p class="text-gray-500">Belum ada aktivitas terbaru.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Recent News -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold">Berita Terbaru</h3>
                                <a href="{{ route('admin.berita.index') }}" class="text-sm text-amber-600 hover:text-amber-800">Lihat Semua</a>
                            </div>

                            <div class="space-y-4">
                                @php
                                    $latestNews = \App\Models\Berita::latest()->take(3)->get();
                                @endphp

                                @forelse($latestNews as $berita)
                                    <div class="flex items-start p-4 border rounded-lg hover:bg-amber-50 transition-colors">
                                        @if($berita->gambar)
                                            <div class="flex-shrink-0 mr-4">
                                                <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-16 h-16 object-cover rounded">
                                            </div>
                                        @endif
                                        <div class="flex-1">
                                            <h4 class="font-medium text-gray-900">{{ $berita->judul }}</h4>
                                            <p class="text-sm text-gray-500 mt-1">{{ Str::limit(strip_tags($berita->konten), 80) }}</p>
                                            <div class="flex items-center mt-2 text-xs text-gray-500">
                                                <span class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    {{ $berita->created_at->format('d M Y') }}
                                                </span>
                                                <span class="mx-2">•</span>
                                                <span class="px-2 py-1 rounded-full text-xs {{ $berita->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                    {{ $berita->is_published ? 'Dipublikasikan' : 'Draft' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex space-x-1">
                                            <a href="{{ route('berita.show', $berita->slug) }}" target="_blank" class="p-1 text-blue-600 hover:bg-blue-100 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="p-1 text-amber-600 hover:bg-amber-100 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                        <p class="text-gray-500">Belum ada berita yang dibuat.</p>
                                        <a href="{{ route('admin.berita.create') }}" class="mt-2 inline-flex items-center px-3 py-1 bg-amber-100 border border-transparent rounded-md font-medium text-xs text-amber-700 hover:bg-amber-200">
                                            Buat Berita Baru
                                        </a>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Map Overview -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold mb-4">Peta Sebaran</h3>
                            <div id="map" class="h-80 rounded-lg border"></div>
                        </div>
                    </div>
                </div>

                <!-- Quick Access & Summary -->
                <div class="lg:col-span-1">
                    <!-- Quick Access -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold mb-4">Akses Cepat</h3>

                            <div class="space-y-2">
                                <a href="{{ route('admin.dusun.create') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-lg">
                                    <div class="p-2 rounded-full bg-blue-100 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </div>
                                    <span>Tambah Dusun</span>
                                </a>

                                <a href="{{ route('admin.pertanian.create') }}" class="flex items-center p-3 bg-green-50 hover:bg-green-100 rounded-lg">
                                    <div class="p-2 rounded-full bg-green-100 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </div>
                                    <span>Tambah Kelompok Tani</span>
                                </a>

                                {{-- <a href="{{ route('admin.peternakan.create') }}" class="flex items-center p-3 bg-yellow-50 hover:bg-yellow-100 rounded-lg">
                                    <div class="p-2 rounded-full bg-yellow-100 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </div>
                                    <span>Tambah Kelompok Ternak</span>
                                </a> --}}

                                <a href="{{ route('admin.lembaga.create') }}" class="flex items-center p-3 bg-red-50 hover:bg-red-100 rounded-lg">
                                    <div class="p-2 rounded-full bg-red-100 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </div>
                                    <span>Tambah Lembaga</span>
                                </a>

                                <a href="{{ route('admin.umkm.create') }}" class="flex items-center p-3 bg-purple-50 hover:bg-purple-100 rounded-lg">
                                    <div class="p-2 rounded-full bg-purple-100 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </div>
                                    <span>Tambah UMKM</span>
                                </a>

                                <a href="{{ route('admin.berita.create') }}" class="flex items-center p-3 bg-amber-50 hover:bg-amber-100 rounded-lg">
                                    <div class="p-2 rounded-full bg-amber-100 mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </div>
                                    <span>Tambah Berita</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- News Status -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold mb-4">Status Berita</h3>
                            
                            @php
                                $publishedCount = \App\Models\Berita::where('is_published', true)->count();
                                $draftCount = \App\Models\Berita::where('is_published', false)->count();
                                $totalCount = $publishedCount + $draftCount;
                                $publishedPercentage = $totalCount > 0 ? round(($publishedCount / $totalCount) * 100) : 0;
                            @endphp
                            
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700">Dipublikasikan</span>
                                <span class="text-sm font-medium text-gray-700">{{ $publishedCount }} dari {{ $totalCount }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                                <div class="bg-amber-500 h-2.5 rounded-full" style="width: {{ $publishedPercentage }}%"></div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                <div class="bg-green-50 p-3 rounded-lg text-center">
                                    <div class="text-2xl font-bold text-green-700">{{ $publishedCount }}</div>
                                    <div class="text-sm text-green-600">Dipublikasikan</div>
                                </div>
                                <div class="bg-gray-50 p-3 rounded-lg text-center">
                                    <div class="text-2xl font-bold text-gray-700">{{ $draftCount }}</div>
                                    <div class="text-sm text-gray-600">Draft</div>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <a href="{{ route('admin.berita.index') }}" class="w-full flex justify-center items-center px-4 py-2 bg-amber-100 text-amber-700 rounded-md hover:bg-amber-200 transition-colors text-sm font-medium">
                                    Kelola Semua Berita
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Summary by Dusun -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold mb-4">Ringkasan per Dusun</h3>

                            <div class="space-y-3">
                                @php
                                    $dusuns = \App\Models\Dusun::withCount(['pertanians', 'lembagas', 'umkms'])->get();
                                @endphp

                                @forelse($dusuns as $dusun)
                                    <div class="p-3 border rounded-lg">
                                        <h4 class="font-medium">{{ $dusun->nama }}</h4>
                                        <div class="grid grid-cols-4 gap-2 mt-2 text-sm">
                                            <div class="text-center p-1 bg-green-50 rounded">
                                                <span class="block text-green-700">Tani</span>
                                                <span class="font-bold">{{ $dusun->pertanians_count }}</span>
                                            </div>
                                            {{-- <div class="text-center p-1 bg-yellow-50 rounded">
                                                <span class="block text-yellow-700">Ternak</span>
                                                <span class="font-bold">{{ $dusun->peternakans_count }}</span>
                                            </div> --}}
                                            <div class="text-center p-1 bg-red-50 rounded">
                                                <span class="block text-red-700">Lembaga</span>
                                                <span class="font-bold">{{ $dusun->lembagas_count }}</span>
                                            </div>
                                            <div class="text-center p-1 bg-purple-50 rounded">
                                                <span class="block text-purple-700">UMKM</span>
                                                <span class="font-bold">{{ $dusun->umkms_count }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-gray-500">Belum ada data dusun.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
    $locations = collect();
    $pertanians = \App\Models\Pertanian::whereNotNull('latitude')->whereNotNull('longitude')->get();
    foreach ($pertanians as $p) {
        $locations->push(['lat' => (float)$p->latitude, 'lng' => (float)$p->longitude, 'name' => $p->nama_kelompok, 'type' => 'Pertanian']);
    }
    $lembagas = \App\Models\Lembaga::whereNotNull('latitude')->whereNotNull('longitude')->get();
    foreach ($lembagas as $l) {
        $locations->push(['lat' => (float)$l->latitude, 'lng' => (float)$l->longitude, 'name' => $l->nama_lembaga, 'type' => 'Lembaga']);
    }
    $umkms = \App\Models\UMKM::whereNotNull('latitude')->whereNotNull('longitude')->get();
    foreach ($umkms as $u) {
        $locations->push(['lat' => (float)$u->latitude, 'lng' => (float)$u->longitude, 'name' => $u->nama_usaha, 'type' => 'UMKM']);
    }
@endphp

  <script>
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi peta
    var map = L.map('map').setView([-7.7956, 110.3695], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Fungsi untuk membuat ikon SVG dengan warna berbeda
    function getColoredIcon(color) {
        let svg = `
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="${color}" width="30" height="30">
                <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
            </svg>
        `;
        return L.icon({
            iconUrl: "data:image/svg+xml;base64," + btoa(svg),
            iconSize: [30, 30],
            iconAnchor: [15, 30],
            popupAnchor: [0, -30]
        });
    }

    // Data dari Laravel
    let locations = @json($locations); // Pastikan $locations ada di controller

    // Tambahkan marker ke peta
    locations.forEach(item => {
        let icon;

        if (item.type === 'UMKM') {
            icon = getColoredIcon('#7c3aed'); // ungu
        } else if (item.type === 'Lembaga') {
            icon = getColoredIcon('#dc2626'); // merah
        } else if (item.type === 'Pertanian') {
            icon = getColoredIcon('#15803d'); // hijau
        } else if (item.type === 'Peternakan') {
            icon = getColoredIcon('#ea580c'); // oranye
        } else {
            icon = getColoredIcon('#0000FF'); // default biru
        }

        L.marker([item.lat, item.lng], { icon })
            .addTo(map)
            .bindPopup(`<b>${item.name}</b><br>${item.type}`);
    });

    // Fit map ke semua marker
    if (locations.length > 0) {
        let bounds = L.latLngBounds(locations.map(l => [l.lat, l.lng]));
        map.fitBounds(bounds);
    }
});
</script>


</x-app-layout>
