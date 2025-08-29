<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.desa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- Nama Desa --}}
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Desa</label>
                                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Kepala Desa --}}
                            <div>
                                <label for="kepala_desa" class="block text-sm font-medium text-gray-700">Kepala Desa</label>
                                <input type="text" name="kepala_desa" id="kepala_desa" value="{{ old('kepala_desa') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                @error('kepala_desa') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Visi --}}
                            <div>
                                <label for="visi" class="block text-sm font-medium text-gray-700">Visi</label>
                                <textarea name="visi" id="visi" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">{{ old('visi') }}</textarea>
                                @error('visi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Misi --}}
                            <div>
                                <label for="misi" class="block text-sm font-medium text-gray-700">Misi</label>
                                <textarea name="misi" id="misi" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">{{ old('misi') }}</textarea>
                                @error('misi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Luas Wilayah --}}
                            <div>
                                <label for="luas_wilayah" class="block text-sm font-medium text-gray-700">Luas Wilayah (km²)</label>
                                <input type="number" step="0.01" name="luas_wilayah" id="luas_wilayah" value="{{ old('luas_wilayah') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                @error('luas_wilayah') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Alamat --}}
                            <div>
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                @error('alamat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Kode Pos --}}
                            <div>
                                <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                                <input type="text" name="kode_pos" id="kode_pos" value="{{ old('kode_pos') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                @error('kode_pos') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Kecamatan --}}
                            <div>
                                <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                                <input type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                @error('kecamatan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Kabupaten --}}
                            <div>
                                <label for="kabupaten" class="block text-sm font-medium text-gray-700">Kabupaten</label>
                                <input type="text" name="kabupaten" id="kabupaten" value="{{ old('kabupaten') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                @error('kabupaten') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Provinsi --}}
                            <div>
                                <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                <input type="text" name="provinsi" id="provinsi" value="{{ old('provinsi') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                @error('provinsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Logo --}}
                            <div>
                                <label for="logo" class="block text-sm font-medium text-gray-700">Logo Desa</label>
                                <input type="file" name="logo" id="logo" accept="image/*"
                                    class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2
                                    file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold
                                    file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                                @error('logo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Foto --}}
                            <div>
                                <label for="foto" class="block text-sm font-medium text-gray-700">Foto Desa</label>
                                <input type="file" name="foto" id="foto" accept="image/*"
                                    class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2
                                    file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold
                                    file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                                @error('foto') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Google Maps Embed URL --}}
                            <div class="md:col-span-2">
                                <label for="maps_embed_url" class="block text-sm font-medium text-gray-700">Google Maps Embed URL</label>
                                <input type="text" name="maps_embed_url" id="maps_embed_url" value="{{ old('maps_embed_url') }}"
                                    placeholder="https://www.google.com/maps/embed?pb=..."
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                <p class="text-xs text-gray-500 mt-1">
                                    Dapatkan dari Google Maps → Bagikan → Sematkan peta → salin URL pada <code>src=""</code> iframe.
                                </p>
                                @error('maps_embed_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Google Maps Place URL (opsional) --}}
                            <div class="md:col-span-2">
                                <label for="maps_place_url" class="block text-sm font-medium text-gray-700">Google Maps Place URL (Opsional)</label>
                                <input type="text" name="maps_place_url" id="maps_place_url" value="{{ old('maps_place_url') }}"
                                    placeholder="https://maps.app.goo.gl/..."
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                <p class="text-xs text-gray-500 mt-1">
                                    Dapatkan dari Google Maps → Bagikan → salin link biasa (bukan sematan) untuk tombol "Buka di Google Maps".
                                </p>
                                @error('maps_place_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="mt-6 flex justify-end space-x-3">
                            <a href="{{ route('admin.desa.index') }}"
                               class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
                            <button type="submit"
                                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
