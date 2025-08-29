<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kelompok Peternakan') }}
        </h2>
    </x-slot>

    <!-- Include Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.peternakan.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kolom Kiri -->
                            <div class="space-y-4">
                                <div>
                                    <label for="nama_kelompok" class="block text-sm font-medium text-gray-700">Nama Kelompok</label>
                                    <input type="text" name="nama_kelompok" id="nama_kelompok" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('nama_kelompok') }}" required>
                                    @error('nama_kelompok')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="ketua" class="block text-sm font-medium text-gray-700">Ketua</label>
                                    <input type="text" name="ketua" id="ketua" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('ketua') }}" required>
                                    @error('ketua')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jenis_ternak" class="block text-sm font-medium text-gray-700">Jenis Ternak</label>
                                    <input type="text" name="jenis_ternak" id="jenis_ternak" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('jenis_ternak') }}" required>
                                    @error('jenis_ternak')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jumlah_ternak" class="block text-sm font-medium text-gray-700">Jumlah Ternak</label>
                                    <input type="number" name="jumlah_ternak" id="jumlah_ternak" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('jumlah_ternak') }}" required>
                                    @error('jumlah_ternak')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jumlah_anggota" class="block text-sm font-medium text-gray-700">Jumlah Anggota</label>
                                    <input type="number" name="jumlah_anggota" id="jumlah_anggota" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('jumlah_anggota') }}" required>
                                    @error('jumlah_anggota')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="dusun_id" class="block text-sm font-medium text-gray-700">Lokasi Dusun</label>
                                    <select name="dusun_id" id="dusun_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                                        <option value="">Pilih Dusun</option>
                                        @foreach($dusuns as $dusun)
                                            <option value="{{ $dusun->id }}" {{ old('dusun_id') == $dusun->id ? 'selected' : '' }}>{{ $dusun->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('dusun_id')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi GPS</label>
                                    <div id="map" style="height: 280px;" class="rounded-md border border-gray-300"></div>
                                    <p class="text-sm text-gray-500 mt-1">Klik pada peta untuk menentukan lokasi</p>
                                    <div class="grid grid-cols-2 gap-4 mt-2">
                                        <div>
                                            <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                                            <input type="text" name="latitude" id="latitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('latitude') }}" readonly>
                                        </div>
                                        <div>
                                            <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                                            <input type="text" name="longitude" id="longitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('longitude') }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="alamat_detail" class="block text-sm font-medium text-gray-700">Detail Alamat</label>
                                    <input type="text" name="alamat_detail" id="alamat_detail" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('alamat_detail') }}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">{{ old('deskripsi') }}</textarea>
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.peternakan.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([-7.17583, 112.43611], 15); // Fokus ke Dukuhagung, Tikung, Lamongan
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© Rahmat Maliki'
            }).addTo(map);

            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;

                // Jangan timpa jika user sudah klik marker atau ada old value
                if (!oldLat || !oldLng) {
                    map.setView([lat, lng], 15);
                    addMarker(lat, lng);
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                }
            }, function() {
                console.log("Geolocation gagal. Lokasi default digunakan.");
            });
        }

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

            // If latitude and longitude are already set (e.g., from old input), add a marker
            var oldLat = "{{ old('latitude') }}";
            var oldLng = "{{ old('longitude') }}";

            if (oldLat && oldLng) {
                addMarker(parseFloat(oldLat), parseFloat(oldLng));
                map.setView([parseFloat(oldLat), parseFloat(oldLng)], 15);
            }
        });
    </script>
</x-app-layout>