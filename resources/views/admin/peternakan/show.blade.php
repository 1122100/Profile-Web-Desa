<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kelompok Peternakan') }}
        </h2>
    </x-slot>

    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4">Informasi Kelompok {{ $peternakan->nama_kelompok }}</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <p class="text-sm text-gray-600">Nama Kelompok</p>
                                <p class="font-medium">{{ $peternakan->nama_kelompok }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Ketua</p>
                                <p class="font-medium">{{ $peternakan->ketua }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Jenis Ternak</p>
                                <p class="font-medium">{{ $peternakan->jenis_ternak }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Jumlah Ternak</p>
                                <p class="font-medium">{{ $peternakan->jumlah_ternak }} ekor</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Jumlah Anggota</p>
                                <p class="font-medium">{{ $peternakan->jumlah_anggota }} orang</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Dusun</p>
                                <p class="font-medium">{{ $peternakan->dusun->nama ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Detail Alamat</p>
                                <p class="font-medium">{{ $peternakan->alamat_detail ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Koordinat</p>
                                <p class="font-medium">
                                    {{ $peternakan->latitude ?? '-' }},
                                    {{ $peternakan->longitude ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <p class="text-sm text-gray-600">Deskripsi</p>
                            <p class="mt-1">{{ $peternakan->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                        </div>

                        <!-- Peta Lokasi -->
                        @if($peternakan->latitude && $peternakan->longitude)
                            <div class="mb-6">
                                <p class="text-sm text-gray-600 mb-2">Lokasi di Peta</p>
                                <div id="map" style="height: 400px;" class="rounded-md border border-gray-300"></div>
                            </div>
                        @endif

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.peternakan.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.peternakan.edit', $peternakan->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('admin.peternakan.destroy', $peternakan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelompok ini?');">
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
    </div>

    @if($peternakan->latitude && $peternakan->longitude)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([{{ $peternakan->latitude }}, {{ $peternakan->longitude }}], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            L.marker([{{ $peternakan->latitude }}, {{ $peternakan->longitude }}])
                .addTo(map)
                .bindPopup("{{ $peternakan->nama_kelompok }}<br>{{ $peternakan->alamat_detail ?? 'Lokasi Peternakan' }}")
                .openPopup();
        });
    </script>
    @endif
</x-app-layout>
