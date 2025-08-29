<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Lembaga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.lembaga.update', $lembaga->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nama_lembaga" class="block text-sm font-medium text-gray-700">Nama Lembaga</label>
                            <input type="text" name="nama_lembaga" id="nama_lembaga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('nama_lembaga', $lembaga->nama_lembaga) }}" required>
                            @error('nama_lembaga')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="jenis_lembaga" class="block text-sm font-medium text-gray-700">Jenis Lembaga</label>
                            <input type="text" name="jenis_lembaga" id="jenis_lembaga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('jenis_lembaga', $lembaga->jenis_lembaga) }}" required>
                            @error('jenis_lembaga')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tahun_berdiri" class="block text-sm font-medium text-gray-700">Tahun Berdiri</label>
                            <input type="number" name="tahun_berdiri" id="tahun_berdiri" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('tahun_berdiri', $lembaga->tahun_berdiri) }}" min="1900" max="{{ date('Y') }}">
                            @error('tahun_berdiri')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="dusun_id" class="block text-sm font-medium text-gray-700">Lokasi Dusun</label>
                            <select name="dusun_id" id="dusun_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                                <option value="">Pilih Dusun</option>
                                @foreach($dusuns as $dusun)
                                    <option value="{{ $dusun->id }}" {{ old('dusun_id', $lembaga->dusun_id) == $dusun->id ? 'selected' : '' }}>{{ $dusun->nama }}</option>
                                @endforeach
                            </select>
                            @error('dusun_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="alamat_detail" class="block text-sm font-medium text-gray-700">Detail Alamat</label>
                            <input type="text" name="alamat_detail" id="alamat_detail" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('alamat_detail', $lembaga->alamat_detail) }}">
                            @error('alamat_detail')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- GPS Location Map -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi GPS</label>
                            <div id="map" style="height: 400px;" class="rounded-md border border-gray-300"></div>
                            <p class="text-sm text-gray-500 mt-1">Klik pada peta untuk menentukan lokasi</p>
                            
                            <div class="grid grid-cols-2 gap-4 mt-2">
                                <div>
                                    <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                                    <input type="text" name="latitude" id="latitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('latitude', $lembaga->latitude) }}" readonly>
                                    @error('latitude')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                                    <input type="text" name="longitude" id="longitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('longitude', $lembaga->longitude) }}" readonly>
                                    @error('longitude')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                            @if($lembaga->foto)
                                <div class="mt-2 mb-2">
                                    <img src="{{ asset('storage/' . $lembaga->foto) }}" alt="Foto Lembaga" class="w-64 h-auto">
                                    <p class="text-sm text-gray-500 mt-1">Foto saat ini</p>
                                </div>
                            @endif
                            <input type="file" name="foto" id="foto" class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" accept="image/*">
                            <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah foto</p>
                            @error('foto')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.lembaga.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the map
            var map = L.map('map').setView([-7.7956, 110.3695], 13); // Default to Yogyakarta area
            
            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);
            
            var marker;
            
            // Function to add a marker to the map
            function addMarker(lat, lng) {
                // Remove existing marker if any
                if (marker) {
                    map.removeLayer(marker);
                }
                
                // Add new marker
                marker = L.marker([lat, lng], {draggable: true}).addTo(map);
                
                // Update form fields when marker is dragged
                marker.on('dragend', function(event) {
                    var position = marker.getLatLng();
                    document.getElementById('latitude').value = position.lat;
                    document.getElementById('longitude').value = position.lng;
                });
            }
            
            // Add marker when map is clicked
            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;
                
                addMarker(lat, lng);
                
                // Update form fields
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
            });
            
            // If latitude and longitude are already set, add a marker
            var lat = "{{ $lembaga->latitude }}";
            var lng = "{{ $lembaga->longitude }}";
            
            if (lat && lng) {
                addMarker(parseFloat(lat), parseFloat(lng));
                map.setView([parseFloat(lat), parseFloat(lng)], 15);
            }
        });
    </script>
</x-app-layout>