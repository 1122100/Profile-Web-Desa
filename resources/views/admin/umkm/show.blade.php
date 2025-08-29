<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail UMKM') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4">Informasi UMKM {{ $umkm->nama_usaha }}</h3>
                        @if($umkm->foto)
                            <div class="mb-6">
                                <p class="text-sm text-gray-600">Foto UMKM</p>
                                <img src="{{ asset('storage/' . $umkm->foto) }}" alt="Foto {{ $umkm->nama_usaha }}" class="mt-2 w-42 h-56 rounded shadow">
                            </div>
                        @endif
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <p class="text-sm text-gray-600">Nama Usaha</p>
                                <p class="font-medium">{{ $umkm->nama_usaha }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Pemilik</p>
                                <p class="font-medium">{{ $umkm->pemilik }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Jenis Usaha</p>
                                <p class="font-medium">{{ $umkm->jenis_usaha }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Tahun Berdiri</p>
                                <p class="font-medium">{{ $umkm->tahun_berdiri }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Jumlah Karyawan</p>
                                <p class="font-medium">{{ $umkm->jumlah_karyawan }} orang</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Dusun</p>
                                <p class="font-medium">{{ $umkm->dusun->nama ?? 'Tidak ada' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Alamat</p>
                                <p class="font-medium">{{ $umkm->alamat }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Kontak</p>
                                <p class="font-medium">{{ $umkm->kontak ?? 'Tidak ada kontak' }}</p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <p class="text-sm text-gray-600">Deskripsi Usaha</p>
                            <p class="mt-1">{{ $umkm->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.umkm.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.umkm.edit', $umkm->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('admin.umkm.destroy', $umkm->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus UMKM ini?');">
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
</x-app-layout>
