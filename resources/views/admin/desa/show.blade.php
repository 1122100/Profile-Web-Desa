<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Desa
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('admin.desa.edit', $desa->id) }}"
                   class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Edit
                </a>
                <a href="{{ route('admin.desa.index') }}"
                   class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">
                    Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Informasi Desa -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-bold text-primary-700 mb-4">Informasi Desa</h3>
                <table class="min-w-full border divide-y divide-gray-200">
                    <tbody class="divide-y divide-gray-200">
                        <tr><th class="p-2 w-1/3 font-medium">Nama Desa</th><td class="p-2">{{ $desa->nama }}</td></tr>
                        <tr><th class="p-2">Kepala Desa</th><td class="p-2">{{ $desa->kepala_desa }}</td></tr>
                        <tr><th class="p-2">Alamat</th><td class="p-2">{{ $desa->alamat }}</td></tr>
                        <tr><th class="p-2">Kode Pos</th><td class="p-2">{{ $desa->kode_pos }}</td></tr>
                        <tr><th class="p-2">Kecamatan</th><td class="p-2">{{ $desa->kecamatan }}</td></tr>
                        <tr><th class="p-2">Kabupaten</th><td class="p-2">{{ $desa->kabupaten }}</td></tr>
                        <tr><th class="p-2">Provinsi</th><td class="p-2">{{ $desa->provinsi }}</td></tr>
                        <tr><th class="p-2">Email</th><td class="p-2">{{ $desa->email }}</td></tr>
                        <tr><th class="p-2">Luas Wilayah</th><td class="p-2">{{ $desa->luas_wilayah }} Ha</td></tr>
                    </tbody>
                </table>
            </div>

            <!-- Visi & Misi -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-bold mb-2">Visi</h3>
                <p class="mb-4">{{ $desa->visi }}</p>
                <h3 class="text-lg font-bold mb-2">Misi</h3>
                <p>{{ $desa->misi }}</p>
            </div>

            <!-- Logo dan Foto -->
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <h3 class="font-bold mb-4">Logo Desa</h3>
                    @if($desa->logo)
                        <img src="{{ asset('storage/' . $desa->logo) }}"
                             alt="Logo Desa" class="mx-auto max-h-48 mb-3">
                    @else
                        <p class="text-gray-500">Tidak ada logo</p>
                    @endif
                </div>

                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <h3 class="font-bold mb-4">Foto Desa</h3>
                    @if($desa->foto)
                        <img src="{{ asset('storage/' . $desa->foto) }}"
                             alt="Foto Desa" class="mx-auto mb-3">
                    @else
                        <p class="text-gray-500">Tidak ada foto</p>
                    @endif
                </div>
            </div>

            <!-- Peta Lokasi -->
            @if($desa->latitude && $desa->longitude)
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="font-bold mb-4">Lokasi Desa</h3>
                    <div id="map" class="w-full h-96 rounded"></div>
                </div>
            @endif

        </div>
    </div>

    @if($desa->latitude && $desa->longitude)
        @push('scripts')
        <script>
            var map = L.map('map').setView([{{ $desa->latitude }}, {{ $desa->longitude }}], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            L.marker([{{ $desa->latitude }}, {{ $desa->longitude }}]).addTo(map)
                .bindPopup('{{ $desa->nama }}')
                .openPopup();
        </script>
        @endpush
    @endif
</x-app-layout>
