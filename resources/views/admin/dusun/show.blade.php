<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Dusun') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4">Informasi Dusun {{ $dusun->nama }}</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <p class="text-sm text-gray-600">Nama Dusun</p>
                                <p class="font-medium">{{ $dusun->nama }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Kepala Dusun</p>
                                <p class="font-medium">{{ $dusun->kepala_dusun }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Jumlah Penduduk</p>
                                <p class="font-medium">{{ $dusun->jumlah_penduduk }} orang</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Luas Wilayah</p>
                                <p class="font-medium">{{ $dusun->luas_wilayah }} hektar</p>
                            </div>
                            @if($dusun->foto)
                                <div class="md:col-span-2">
                                    <p class="text-sm text-gray-600 mb-2">Foto Dusun</p>
                                    <img src="{{ asset('storage/' . $dusun->foto) }}"
                                        alt="Foto Dusun"
                                        class="rounded shadow-md w-full max-w-md">
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.dusun.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.dusun.edit', $dusun->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('admin.dusun.destroy', $dusun->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dusun ini?');">
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
