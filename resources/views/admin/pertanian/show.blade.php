<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kelompok Tani') }}
        </h2>
    </x-slot>

    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Judul -->
                    <h3 class="text-lg font-semibold mb-6">
                        Informasi Kelompok Tani {{ $pertanian->nama_kelompok }}
                    </h3>

                    <!-- Informasi Utama -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <p class="text-sm text-gray-500">Nama Kelompok</p>
                            <p class="font-medium">{{ $pertanian->nama_kelompok }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Ketua</p>
                            <p class="font-medium">{{ $pertanian->ketua }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Jenis Tanaman</p>
                            <p class="font-medium">{{ $pertanian->jenis_tanaman }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Luas Lahan</p>
                            <p class="font-medium">{{ $pertanian->luas_lahan }} hektar</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Jumlah Anggota</p>
                            <p class="font-medium">{{ $pertanian->jumlah_anggota }} orang</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Dusun</p>
                            <p class="font-medium">{{ $pertanian->dusun->nama ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Detail Alamat</p>
                            <p class="font-medium">{{ $pertanian->alamat_detail ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Latitude</p>
                            <p class="font-medium">{{ $pertanian->latitude ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Longitude</p>
                            <p class="font-medium">{{ $pertanian->longitude ?? '-' }}</p>
                        </div>
                    </div>

                <!-- Deskripsi -->
                    <div class="mb-8">
                        <p class="text-sm text-gray-500">Deskripsi</p>
                        <p class="mt-1">{{ $pertanian->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                    </div>
                    <!-- Peta -->
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Lokasi GPS @if($pertanian->dusun) - {{ $pertanian->dusun->nama }} @endif
                        </label>
                        <div id="map" style="height: 400px;" class="rounded-lg border border-gray-300 shadow"></div>
                    </div>


                    <!-- Tombol -->
                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.pertanian.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.pertanian.edit', $pertanian->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('admin.pertanian.destroy', $pertanian->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelompok tani ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var lat = parseFloat("{{ $pertanian->latitude ?? '-7.1228' }}");
        var lng = parseFloat("{{ $pertanian->longitude ?? '112.4197' }}");

        var map = L.map('map').setView([lat, lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        if (!isNaN(lat) && !isNaN(lng)) {
            L.marker([lat, lng]).addTo(map)
                .bindPopup("<strong>{{ $pertanian->nama_kelompok }}</strong><br>{{ $pertanian->dusun->nama ?? '' }}")
                .openPopup();
        }
    });
</script>
</x-app-layout>
