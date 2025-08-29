<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kelompok Tani') }}
        </h2>
    </x-slot>

    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.pertanian.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Kolom Kiri -->
                            <div>
                                <div class="mb-4">
                                    <label for="nama_kelompok" class="block text-sm font-medium text-gray-700">Nama Kelompok</label>
                                    <input type="text" name="nama_kelompok" id="nama_kelompok" value="{{ old('nama_kelompok') }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @error('nama_kelompok')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="ketua" class="block text-sm font-medium text-gray-700">Ketua</label>
                                    <input type="text" name="ketua" id="ketua" value="{{ old('ketua') }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @error('ketua')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="jenis_tanaman" class="block text-sm font-medium text-gray-700">Jenis Tanaman</label>
                                    <input type="text" name="jenis_tanaman" id="jenis_tanaman" value="{{ old('jenis_tanaman') }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @error('jenis_tanaman')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="luas_lahan" class="block text-sm font-medium text-gray-700">Luas Lahan (ha)</label>
                                    <input type="number" step="0.01" name="luas_lahan" id="luas_lahan" value="{{ old('luas_lahan') }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @error('luas_lahan')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="jumlah_anggota" class="block text-sm font-medium text-gray-700">Jumlah Anggota</label>
                                    <input type="number" name="jumlah_anggota" id="jumlah_anggota" value="{{ old('jumlah_anggota') }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @error('jumlah_anggota')
                                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
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
                            <div>
                                <!-- Map -->
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Lokasi GPS</label>
                                    <div id="map" style="height: 300px;" class="rounded-md border border-gray-300"></div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                                        <input type="text" name="latitude" id="latitude" value="{{ old('latitude') }}" class="mt-1 block w-full rounded-md border-gray-300" readonly>
                                    </div>
                                    <div>
                                        <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                                        <input type="text" name="longitude" id="longitude" value="{{ old('longitude') }}" class="mt-1 block w-full rounded-md border-gray-300" readonly>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label for="alamat_detail" class="block text-sm font-medium text-gray-700">Detail Alamat</label>
                                    <input type="text" name="alamat_detail" id="alamat_detail" value="{{ old('alamat_detail') }}" class="mt-1 block w-full rounded-md border-gray-300">
                                </div>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4 mt-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full rounded-md border-gray-300">{{ old('deskripsi') }}</textarea>
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.pertanian.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Map -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([-7.7956, 110.3695], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            var marker;
            function addMarker(lat, lng) {
                if (marker) map.removeLayer(marker);
                marker = L.marker([lat, lng], {draggable: true}).addTo(map);
                marker.on('dragend', function(e) {
                    var pos = marker.getLatLng();
                    document.getElementById('latitude').value = pos.lat;
                    document.getElementById('longitude').value = pos.lng;
                });
            }

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(pos) {
                    var lat = pos.coords.latitude;
                    var lng = pos.coords.longitude;
                    map.setView([lat, lng], 15);
                    addMarker(lat, lng);
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                });
            }

            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;
                addMarker(lat, lng);
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
            });
        });
    </script>
</x-app-layout>
