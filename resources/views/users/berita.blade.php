@extends('layouts.public')

@section('content')
    <!-- Hero Section -->
    <section class="relative pt-24 pb-16 md:pt-32 md:pb-24 bg-gradient-to-r from-green-700 to-emerald-600 text-white overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/30"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6" data-aos="fade-up">Berita Desa</h1>
                <p class="text-lg md:text-xl text-white/90 mb-8" data-aos="fade-up" data-aos-delay="100">
                    Informasi terbaru seputar kegiatan dan perkembangan desa
                </p>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Search and Filter -->
            <div class="max-w-5xl mx-auto mb-12">
                <form action="{{ route('berita') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 relative">
                        <input type="text" name="search" placeholder="Cari berita..." value="{{ request('search') }}"
                            class="w-full pl-10 pr-4 py-3 rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 transition-all duration-200">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                    <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 font-medium">
                        Cari
                    </button>
                </form>
            </div>

            @if($beritas->isEmpty())
                <div class="max-w-5xl mx-auto text-center py-16">
                    <div class="mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum ada berita</h3>
                    <p class="text-gray-600 mb-8">Berita dan informasi terbaru akan ditampilkan di sini.</p>
                </div>
            @else
                <div class="max-w-5xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($beritas as $berita)
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                <a href="{{ route('berita.show', $berita->slug) }}" class="block">
                                    <div class="h-48 overflow-hidden">
                                        @if($berita->gambar)
                                            <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                        @else
                                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </a>
                                <div class="p-6">
                                    <div class="flex items-center text-sm text-gray-500 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $berita->published_at ? $berita->published_at->format('d M Y') : $berita->created_at->format('d M Y') }}
                                    </div>
                                    <a href="{{ route('berita.show', $berita->slug) }}" class="block">
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3 hover:text-green-600 transition-colors duration-300">{{ $berita->judul }}</h3>
                                    </a>
                                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $berita->excerpt }}</p>
                                    <a href="{{ route('berita.show', $berita->slug) }}" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium">
                                        Baca selengkapnya
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12">
                        {{ $beritas->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection