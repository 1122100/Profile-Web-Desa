<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kelompok Peternakan') }}
        </h2>
    </x-slot>

    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.peternakan.update', $peternakan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kolom Kiri -->
                            <div>
                                <div class="mb-4">
                                    <label for="nama_kelompok" class="block text-sm font-medium text-gray-700">Nama Kelompok</label>
                                    <input type="text" name="nama_kelompok" id="nama_kelompok"
                                        value="{{ old('nama_kelompok', $peternakan->nama_kelompok) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                                    @error('nama_kelompok')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="ketua" class="block text-sm font-medium text-gray-700">Ketua</label>
                                    <input type="text" name="ketua" id="ketua"
                                        value="{{ old('ketua', $peternakan->ketua) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                                    @error('ketua')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="jenis_ternak" class="block text-sm font-medium text-gray-700">Jenis Ternak</label>
                                    <input type="text" name="jenis_ternak" id="jenis_ternak"
                                        value="{{ old('jenis_ternak', $peternakan->jenis_ternak) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                                    @error('jenis_ternak')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="jumlah_ternak" class="block text-sm font-medium text-gray-700">Jumlah Ternak</label>
                                    <input type="number" name="jumlah_ternak" id="jumlah_ternak"
                                        value="{{ old('jumlah_ternak', $peternakan->jumlah_ternak) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                                    @error('jumlah_ternak')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="jumlah_anggota" class="block text-sm font-medium text-gray-700">Jumlah Anggota</label>
                                    <input type="number" name="jumlah_anggota" id="jumlah_anggota"
                                        value="{{ old('jumlah_anggota', $peternakan->jumlah_anggota) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                                    @error('jumlah_anggota')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div>
                                <div class="mb-4">
                                    <label for="dusun_id" class="block text-sm font-medium text-gray-700">Dusun</label>
                                    <select name="dusun_id" id="dusun_id"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                                        <option value="">Pilih Dusun</option>
                                        @foreach($dusuns as $dusun)
                                            <option value="{{ $dusun->id }}" {{ old('dusun_id', $peternakan->dusun_id) == $dusun->id ? 'selected' : '' }}>
                                                {{ $dusun->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('dusun_id')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="alamat_detail" class="block text-sm font-medium text-gray-700">Detail Alamat</label>
                                    <input type="text" name="alamat_detail" id="alamat_detail"
                                        value="{{ old('alamat_detail', $peternakan->alamat_detail) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                    @error('alamat_detail')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Map untuk edit GPS -->
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi GPS</label>
                                    <div id="map" style="height: 250px;" class="rounded-md border border-gray-300"></div>
                                    <div class="grid grid-cols-2 gap-4 mt-2">
                                        <div>
                                            <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                                            <input type="text" name="latitude" id="latitude"
                                                value="{{ old('latitude', $peternakan->latitude) }}"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" readonly>
                                        </div>
                                        <div>
                                            <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                                            <input type="text" name="longitude" id="longitude"
                                                value="{{ old('longitude', $peternakan->longitude) }}"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="3"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">{{ old('deskripsi', $peternakan->deskripsi) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.peternakan.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var lat = {{ $peternakan->latitude ?? -7.7956 }};
            var lng = {{ $peternakan->longitude ?? 110.3695 }};
            var map = L.map('map').setView([lat, lng], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            var marker = L.marker([lat, lng], {draggable: true}).addTo(map);

            marker.on('dragend', function(e) {
                var position = marker.getLatLng();
                document.getElementById('latitude').value = position.lat;
                document.getElementById('longitude').value = position.lng;
            });

            map.on('click', function(e) {
                marker.setLatLng(e.latlng);
                document.getElementById('latitude').value = e.latlng.lat;
                document.getElementById('longitude').value = e.latlng.lng;
            });
        });
    </script>
</x-app-layout>
