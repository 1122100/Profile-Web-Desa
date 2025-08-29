<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Pesan') }}
            </h2>
            <div class="mt-2 md:mt-0">
                <span class="inline-flex items-center px-3 py-1 text-xs rounded-full {{ $kontak->is_read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ $kontak->is_read ? 'Sudah Dibaca' : 'Belum Dibaca' }}
                </span>
                <span class="ml-2 text-sm text-gray-500">
                    {{ $kontak->created_at->format('d M Y, H:i') }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-6 md:py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-6 md:p-8">
                    <!-- Sender Information -->
                    <div class="flex items-start mb-8 pb-6 border-b border-gray-200">
                        <div class="flex-shrink-0 h-12 w-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="text-indigo-700 font-medium text-lg">{{ strtoupper(substr($kontak->nama, 0, 2)) }}</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $kontak->nama }}</h3>
                            <p class="text-gray-600">
                                <a href="mailto:{{ $kontak->email }}" class="hover:text-indigo-600 transition-colors duration-200">
                                    {{ $kontak->email }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="space-y-6">
                        @if($kontak->subjek)
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Subjek</h4>
                            <p class="text-lg font-medium text-gray-800">{{ $kontak->subjek }}</p>
                        </div>
                        @endif

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Pesan</h4>
                            <div class="bg-gray-50 rounded-lg p-4 md:p-6">
                                <p class="text-gray-800 whitespace-pre-line">{{ $kontak->message }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-8 pt-6 border-t border-gray-200 flex flex-wrap gap-3">
                        <a href="{{ route('admin.kontak.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>

                        @if(!$kontak->is_read)
                        <form method="POST" action="{{ route('admin.kontak.mark-as-read', $kontak->id) }}" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Tandai Sudah Dibaca
                            </button>
                        </form>
                        @endif

                        <a href="mailto:{{ $kontak->email }}"
                           class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Balas Email
                        </a>

                        <form method="POST" action="{{ route('admin.kontak.destroy', $kontak->id) }}" class="inline"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
