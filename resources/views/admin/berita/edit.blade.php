<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.berita.update', $beritum->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Berita</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $beritum->judul) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('judul')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="konten" class="block text-sm font-medium text-gray-700">Konten Berita</label>
                            <textarea name="konten" id="konten" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('konten', $beritum->konten) }}</textarea>
                            @error('konten')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Berita</label>
                            
                            @if($beritum->gambar)
                                <div class="mt-2 mb-4">
                                    <img src="{{ Storage::url($beritum->gambar) }}" alt="{{ $beritum->judul }}" class="h-32 w-auto object-cover rounded-md">
                                    <p class="mt-1 text-sm text-gray-500">Gambar saat ini. Unggah gambar baru untuk menggantinya.</p>
                                </div>
                            @endif
                            
                            <input type="file" name="gambar" id="gambar" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, JPEG, GIF. Maksimal 2MB.</p>
                            @error('gambar')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <div class="flex items-center">
                                <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $beritum->is_published) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <label for="is_published" class="ml-2 block text-sm text-gray-700">Publikasikan</label>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Jika tidak dicentang, berita akan disimpan sebagai draft.</p>
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('admin.berita.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-3">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Perbarui Berita
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#konten'))
            .catch(error => {
                console.error(error);
            });
    </script>
    @endpush
</x-app-layout>