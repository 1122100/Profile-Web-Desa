<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Desa
        </h2>
        <a href="{{ route('admin.desa.index') }}"
           class="inline-block mt-2 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            ← Kembali
        </a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.desa.update', $desa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Desa -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Nama Desa <span class="text-red-500">*</span></label>
                            <input type="text" name="nama" value="{{ old('nama', $desa->nama) }}"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 @error('nama') border-red-500 @enderror">
                            @error('nama')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                        </div>

                        <!-- Kepala Desa -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Kepala Desa <span class="text-red-500">*</span></label>
                            <input type="text" name="kepala_desa" value="{{ old('kepala_desa', $desa->kepala_desa) }}"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 @error('kepala_desa') border-red-500 @enderror">
                            @error('kepala_desa')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                        </div>

                        <!-- Visi -->
                        <div class="md:col-span-2">
                            <label class="block font-medium text-sm text-gray-700">Visi</label>
                            <textarea name="visi" rows="2"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">{{ old('visi', $desa->visi) }}</textarea>
                        </div>

                        <!-- Misi -->
                        <div class="md:col-span-2">
                            <label class="block font-medium text-sm text-gray-700">Misi</label>
                            <textarea name="misi" rows="3"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">{{ old('misi', $desa->misi) }}</textarea>
                        </div>

                        <!-- Luas Wilayah -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Luas Wilayah</label>
                            <input type="text" name="luas_wilayah" value="{{ old('luas_wilayah', $desa->luas_wilayah) }}"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" value="{{ old('email', $desa->email) }}"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Kode Pos -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Kode Pos</label>
                            <input type="text" name="kode_pos" value="{{ old('kode_pos', $desa->kode_pos) }}"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Kecamatan -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Kecamatan</label>
                            <input type="text" name="kecamatan" value="{{ old('kecamatan', $desa->kecamatan) }}"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Kabupaten -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Kabupaten</label>
                            <input type="text" name="kabupaten" value="{{ old('kabupaten', $desa->kabupaten) }}"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Provinsi -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Provinsi</label>
                            <input type="text" name="provinsi" value="{{ old('provinsi', $desa->provinsi) }}"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                        </div>

                        <!-- Logo -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Logo</label>
                            <input type="file" name="logo" class="mt-1 w-full text-sm text-gray-500">
                            @if($desa->logo)
                                <img src="{{ asset('storage/' . $desa->logo) }}" class="h-16 mt-2" alt="Logo Desa">
                            @endif
                        </div>

                        <!-- Foto -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Foto</label>
                            <input type="file" name="foto" class="mt-1 w-full text-sm text-gray-500">
                            @if($desa->foto)
                                <img src="{{ asset('storage/' . $desa->foto) }}" class="h-16 mt-2" alt="Foto Desa">
                            @endif
                        </div>

                        <!-- Latitude -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Latitude</label>
                            <input type="text" id="latitude" name="latitude" value="{{ old('latitude', $desa->latitude) }}"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500" readonly>
                        </div>

                        <!-- Longitude -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Longitude</label>
                            <input type="text" id="longitude" name="longitude" value="{{ old('longitude', $desa->longitude) }}"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500" readonly>
                        </div>

                        <!-- Peta Leaflet -->
                        <div class="md:col-span-2">
                            <div id="map" style="height: 400px;" class="rounded border"></div>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="flex items-center justify-end mt-6 space-x-2">
                        <x-primary-button>Update Data</x-primary-button>
                        <a href="{{ route('admin.desa.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var lat = {{ old('latitude', $desa->latitude ?? -6.200000) }};
            var lng = {{ old('longitude', $desa->longitude ?? 106.816666) }};

            var map = L.map('map').setView([lat, lng], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
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
