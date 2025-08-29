<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Dusun') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.dusun.update', $dusun->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Dusun</label>
                            <input type="text" name="nama" id="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('nama', $dusun->nama) }}" required>
                            @error('nama')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="kepala_dusun" class="block text-sm font-medium text-gray-700">Kepala Dusun</label>
                            <input type="text" name="kepala_dusun" id="kepala_dusun" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('kepala_dusun', $dusun->kepala_dusun) }}" required>
                            @error('kepala_dusun')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="jumlah_penduduk" class="block text-sm font-medium text-gray-700">Jumlah Penduduk</label>
                            <input type="number" name="jumlah_penduduk" id="jumlah_penduduk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('jumlah_penduduk', $dusun->jumlah_penduduk) }}" required>
                            @error('jumlah_penduduk')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="luas_wilayah" class="block text-sm font-medium text-gray-700">Luas Wilayah (ha)</label>
                            <input type="number" step="0.01" name="luas_wilayah" id="luas_wilayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" value="{{ old('luas_wilayah', $dusun->luas_wilayah) }}" required>
                            @error('luas_wilayah')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Foto --}}
                        <div class="mb-4">
                            <label for="foto" class="block text-sm font-medium text-gray-700">Foto Dusun</label>

                            {{-- Preview foto lama --}}
                            @if($dusun->foto)
                                <div class="mt-2 mb-2">
                                    <img src="{{ asset('storage/' . $dusun->foto) }}" alt="Foto Dusun" class="w-64 h-auto rounded shadow">
                                    <p class="text-sm text-gray-500 mt-1">Foto saat ini</p>
                                </div>
                            @endif

                            {{-- Input upload --}}
                            <input type="file" name="foto" id="foto"
                                class="mt-1 block w-full text-sm text-gray-700
                                        file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0
                                        file:text-sm file:font-semibold file:bg-green-50 file:text-green-700
                                        hover:file:bg-green-100"
                                accept="image/*">

                            <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah foto</p>
                            {{-- Error --}}
                            @error('foto')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.dusun.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
