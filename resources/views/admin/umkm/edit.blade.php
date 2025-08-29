<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit UMKM') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- KIRI --}}
                            <div>
                                {{-- Nama Usaha --}}
                                <div class="mb-4">
                                    <label for="nama_usaha" class="block text-sm font-medium text-gray-700">Nama Usaha</label>
                                    <input type="text" name="nama_usaha" id="nama_usaha"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500"
                                           value="{{ old('nama_usaha', $umkm->nama_usaha) }}" required>
                                    @error('nama_usaha')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>

                                {{-- Pemilik --}}
                                <div class="mb-4">
                                    <label for="pemilik" class="block text-sm font-medium text-gray-700">Pemilik</label>
                                    <input type="text" name="pemilik" id="pemilik"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500"
                                           value="{{ old('pemilik', $umkm->pemilik) }}" required>
                                    @error('pemilik')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>

                                {{-- Jenis Usaha --}}
                                <div class="mb-4">
                                    <label for="jenis_usaha" class="block text-sm font-medium text-gray-700">Jenis Usaha</label>
                                    <input type="text" name="jenis_usaha" id="jenis_usaha"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500"
                                           value="{{ old('jenis_usaha', $umkm->jenis_usaha) }}" required>
                                    @error('jenis_usaha')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>

                                {{-- Tahun Berdiri --}}
                                <div class="mb-4">
                                    <label for="tahun_berdiri" class="block text-sm font-medium text-gray-700">Tahun Berdiri</label>
                                    <input type="number" name="tahun_berdiri" id="tahun_berdiri"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500"
                                           value="{{ old('tahun_berdiri', $umkm->tahun_berdiri) }}" required>
                                    @error('tahun_berdiri')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>

                                {{-- Jumlah Karyawan --}}
                                <div class="mb-4">
                                    <label for="jumlah_karyawan" class="block text-sm font-medium text-gray-700">Jumlah Karyawan</label>
                                    <input type="number" name="jumlah_karyawan" id="jumlah_karyawan"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500"
                                           value="{{ old('jumlah_karyawan', $umkm->jumlah_karyawan) }}" required>
                                    @error('jumlah_karyawan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                                {{-- Dusun --}}
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Lokasi Dusun</label>
                                    <select name="dusun_id" class="mt-1 block w-full rounded-md border-gray-300" required>
                                        <option value="">Pilih Dusun</option>
                                        @foreach($dusuns as $dusun)
                                            <option value="{{ $dusun->id }}" {{ old('dusun_id', $umkm->dusun_id) == $dusun->id ? 'selected' : '' }}>
                                                {{ $dusun->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('dusun_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                                {{-- Alamat --}}
                                <div class="mb-4">
                                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                    <input type="text" name="alamat" id="alamat"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500"
                                           value="{{ old('alamat', $umkm->alamat) }}" required>
                                    @error('alamat')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>

                                {{-- Kontak --}}
                                <div class="mb-4">
                                    <label for="kontak" class="block text-sm font-medium text-gray-700">Kontak</label>
                                    <input type="text" name="kontak" id="kontak"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500"
                                           value="{{ old('kontak', $umkm->kontak) }}">
                                    @error('kontak')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            {{-- KANAN --}}
                            <div>
                                {{-- Foto UMKM --}}
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Foto UMKM</label>
                                    @if($umkm->foto)
                                        <img src="{{ asset('storage/' . $umkm->foto) }}"
                                             alt="Foto UMKM"
                                             class="w-48 h-48 object-cover rounded mb-2 border">
                                    @endif
                                    <input type="file" name="foto" id="foto"
                                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                                  file:rounded-md file:border-0 file:text-sm file:font-semibold
                                                  file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                                    @error('foto')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>

                                {{-- Deskripsi --}}
                                <div class="mb-4">
                                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Usaha</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="8"
                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                                    @error('deskripsi')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.umkm.index') }}"
                               class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <button type="submit"
                                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
