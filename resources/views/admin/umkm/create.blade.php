<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nama_usaha" class="block text-sm font-medium text-gray-700">Nama Usaha</label>
                                <input type="text" name="nama_usaha" id="nama_usaha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('nama_usaha') }}" required>
                                @error('nama_usaha')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="foto" class="block text-sm font-medium text-gray-700">Foto UMKM</label>
                                <input type="file" name="foto" id="foto" accept="image/*" class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required>
                                @error('foto')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="pemilik" class="block text-sm font-medium text-gray-700">Pemilik</label>
                                <input type="text" name="pemilik" id="pemilik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('pemilik') }}" required>
                                @error('pemilik')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="jenis_usaha" class="block text-sm font-medium text-gray-700">Jenis Usaha</label>
                                <input type="text" name="jenis_usaha" id="jenis_usaha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('jenis_usaha') }}" required>
                                @error('jenis_usaha')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="tahun_berdiri" class="block text-sm font-medium text-gray-700">Tahun Berdiri</label>
                                <input type="number" name="tahun_berdiri" id="tahun_berdiri" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('tahun_berdiri') }}" required>
                                @error('tahun_berdiri')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="jumlah_karyawan" class="block text-sm font-medium text-gray-700">Jumlah Karyawan</label>
                                <input type="number" name="jumlah_karyawan" id="jumlah_karyawan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('jumlah_karyawan') }}" required>
                                @error('jumlah_karyawan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="dusun_id" class="block text-sm font-medium text-gray-700">Lokasi Dusun</label>
                                <select name="dusun_id" id="dusun_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                           focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50" required>
                                    <option value="">Pilih Dusun</option>
                                    @foreach($dusuns as $dusun)
                                        <option value="{{ $dusun->id }}" {{ old('dusun_id') == $dusun->id ? 'selected' : '' }}>
                                            {{ $dusun->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('dusun_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('alamat') }}" required>
                                @error('alamat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="kontak" class="block text-sm font-medium text-gray-700">Kontak</label>
                                <input type="text" name="kontak" id="kontak" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('kontak') }}">
                                @error('kontak')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Usaha</label>
                                <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.umkm.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
