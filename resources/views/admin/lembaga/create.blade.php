<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.lembaga.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kolom Kiri -->
                            <div>
                                {{-- Nama Lembaga --}}
                                <div class="mb-4">
                                    <label for="nama_lembaga" class="block text-sm font-medium text-gray-700">Nama Lembaga</label>
                                    <input type="text" name="nama_lembaga" id="nama_lembaga" value="{{ old('nama_lembaga') }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @error('nama_lembaga')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Jenis Lembaga --}}
                                <div class="mb-4">
                                    <label for="jenis_lembaga" class="block text-sm font-medium text-gray-700">Jenis Lembaga</label>
                                    <input type="text" name="jenis_lembaga" id="jenis_lembaga" value="{{ old('jenis_lembaga') }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @error('jenis_lembaga')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Tahun Berdiri --}}
                                <div class="mb-4">
                                    <label for="tahun_berdiri" class="block text-sm font-medium text-gray-700">Tahun Berdiri</label>
                                    <input type="number" name="tahun_berdiri" id="tahun_berdiri" value="{{ old('tahun_berdiri') }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @error('tahun_berdiri')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Lokasi Dusun --}}
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
                                <div class="mt-4">
                                    <label for="alamat_detail" class="block text-sm font-medium text-gray-700">Detail Alamat</label>
                                    <input type="text" name="alamat_detail" id="alamat_detail" value="{{ old('alamat_detail') }}" class="mt-1 block w-full rounded-md border-gray-300">
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div>
                                {{-- Map --}}
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

                            </div>
                        </div>

                        {{-- Foto --}}
                        <div class="mt-4">
                            <label for="foto" class="block text-sm font-medium text-gray-700">Foto Lembaga</label>
                            <input type="file" name="foto" id="foto" accept="image/*" class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required>
                            @error('foto')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.lembaga.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
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
