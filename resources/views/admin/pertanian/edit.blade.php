<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kelompok Tani') }}
        </h2>
    </x-slot>

    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.pertanian.update', $pertanian->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kolom Kiri -->
                            <div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Nama Kelompok</label>
                                    <input type="text" name="nama_kelompok" value="{{ old('nama_kelompok', $pertanian->nama_kelompok) }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @error('nama_kelompok')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Ketua</label>
                                    <input type="text" name="ketua" value="{{ old('ketua', $pertanian->ketua) }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @error('ketua')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Jenis Tanaman</label>
                                    <input type="text" name="jenis_tanaman" value="{{ old('jenis_tanaman', $pertanian->jenis_tanaman) }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @error('jenis_tanaman')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Luas Lahan (ha)</label>
                                    <input type="number" step="0.01" name="luas_lahan" value="{{ old('luas_lahan', $pertanian->luas_lahan) }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @error('luas_lahan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Jumlah Anggota</label>
                                    <input type="number" name="jumlah_anggota" value="{{ old('jumlah_anggota', $pertanian->jumlah_anggota) }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                                    @error('jumlah_anggota')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Lokasi Dusun</label>
                                    <select name="dusun_id" class="mt-1 block w-full rounded-md border-gray-300" required>
                                        <option value="">Pilih Dusun</option>
                                        @foreach($dusuns as $dusun)
                                            <option value="{{ $dusun->id }}" {{ old('dusun_id', $pertanian->dusun_id) == $dusun->id ? 'selected' : '' }}>
                                                {{ $dusun->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('dusun_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Pilih Lokasi di Peta</label>
                                    <div id="map" style="height: 300px;" class="rounded-md border border-gray-300"></div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Latitude</label>
                                        <input type="text" name="latitude" id="latitude" value="{{ old('latitude', $pertanian->latitude) }}" class="mt-1 block w-full rounded-md border-gray-300" readonly>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Longitude</label>
                                        <input type="text" name="longitude" id="longitude" value="{{ old('longitude', $pertanian->longitude) }}" class="mt-1 block w-full rounded-md border-gray-300" readonly>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Detail Alamat</label>
                                    <input type="text" name="alamat_detail" value="{{ old('alamat_detail', $pertanian->alamat_detail) }}" class="mt-1 block w-full rounded-md border-gray-300">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 mt-4">
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" rows="3" class="mt-1 block w-full rounded-md border-gray-300">{{ old('deskripsi', $pertanian->deskripsi) }}</textarea>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.pertanian.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Peta -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var lat = {{ $pertanian->latitude ?? -7.7956 }};
            var lng = {{ $pertanian->longitude ?? 110.3695 }};
            var map = L.map('map').setView([lat, lng], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            var marker = L.marker([lat, lng], { draggable: true }).addTo(map);

            function updateInputs(lat, lng) {
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
            }

            marker.on('dragend', function(e) {
                var pos = marker.getLatLng();
                updateInputs(pos.lat, pos.lng);
            });

            map.on('click', function(e) {
                marker.setLatLng(e.latlng);
                updateInputs(e.latlng.lat, e.latlng.lng);
            });
        });
    </script>
</x-app-layout>
