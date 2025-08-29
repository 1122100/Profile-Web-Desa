<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Lembaga') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.lembaga.edit', $lembaga->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                <a href="{{ route('admin.lembaga.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Informasi Lembaga</h3>
                            <table class="min-w-full">
                                <tr>
                                    <td class="py-2 font-medium">Nama Lembaga</td>
                                    <td class="py-2 px-4">:</td>
                                    <td class="py-2">{{ $lembaga->nama_lembaga }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 font-medium">Jenis Lembaga</td>
                                    <td class="py-2 px-4">:</td>
                                    <td class="py-2">{{ $lembaga->jenis_lembaga }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 font-medium">Tahun Berdiri</td>
                                    <td class="py-2 px-4">:</td>
                                    <td class="py-2">{{ $lembaga->tahun_berdiri ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 font-medium">Dusun</td>
                                    <td class="py-2 px-4">:</td>
                                    <td class="py-2">{{ $lembaga->dusun->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 font-medium">Detail Alamat</td>
                                    <td class="py-2 px-4">:</td>
                                    <td class="py-2">{{ $lembaga->alamat_detail ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                        
                        <div>
                            @if($lembaga->foto)
                                <h3 class="text-lg font-semibold mb-4">Foto Lembaga</h3>
                                <img src="{{ asset('storage/' . $lembaga->foto) }}" alt="Foto Lembaga" class="w-full h-auto rounded-lg shadow-md">
                            @endif
                        </div>
                    </div>

                    @if($lembaga->latitude && $lembaga->longitude)
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold mb-4">Lokasi</h3>
                            <div id="map" style="height: 400px;" class="rounded-lg border border-gray-300"></div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($lembaga->latitude && $lembaga->longitude)
        <!-- Include Leaflet CSS and JS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize the map
                var map = L.map('map').setView([{{ $lembaga->latitude }}, {{ $lembaga->longitude }}], 15);
                
                // Add OpenStreetMap tiles
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map);
                
                // Add marker for the lembaga location
                L.marker([{{ $lembaga->latitude }}, {{ $lembaga->longitude }}])
                    .addTo(map)
                    .bindPopup("<strong>{{ $lembaga->nama_lembaga }}</strong><br>{{ $lembaga->jenis_lembaga }}");
            });
        </script>
    @endif
</x-app-layout>