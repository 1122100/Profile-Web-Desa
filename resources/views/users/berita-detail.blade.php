@extends('layouts.public')

@section('content')
    <!-- Include structured data for this news article -->
    <x-structured-data-news :berita="$berita" />
    
    <!-- Hero Section -->
    <section class="relative pt-24 pb-16 md:pt-32 md:pb-24 bg-gradient-to-r from-green-700 to-emerald-600 text-white overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/50"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto">
                <div class="flex items-center text-sm text-white/80 mb-4" data-aos="fade-up">
                    <a href="{{ route('berita') }}" class="hover:text-white transition-colors duration-300">Berita</a>
                    <span class="mx-2">/</span>
                    <span>{{ $berita->judul }}</span>
                </div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6" data-aos="fade-up" data-aos-delay="100">{{ $berita->judul }}</h1>
                <div class="flex items-center text-white/80 mb-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>{{ $berita->published_at ? $berita->published_at->format('d M Y') : $berita->created_at->format('d M Y') }}</span>
                    </div>
                    <span class="mx-3">•</span>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>{{ $berita->user->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Content Section -->
    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-12" data-aos="fade-up">
                    @if($berita->gambar)
                        <div class="w-full h-96 overflow-hidden">
                            <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                        </div>
                    @endif
                    
                    <div class="p-6 md:p-10">
                        <div class="prose prose-lg max-w-none">
                            {!! $berita->konten !!}
                        </div>
                        
                        <!-- Share Buttons -->
                        <div class="mt-12 pt-6 border-t border-gray-200">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Bagikan Berita Ini</h4>
                            <div class="flex space-x-4">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('berita.show', $berita->slug)) }}" target="_blank" class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                                    </svg>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(route('berita.show', $berita->slug)) }}" target="_blank" class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-400 text-white hover:bg-blue-500 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . route('berita.show', $berita->slug)) }}" target="_blank" class="flex items-center justify-center w-10 h-10 rounded-full bg-green-500 text-white hover:bg-green-600 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent News Section -->
                @if($recentBeritas->isNotEmpty())
                    <div class="mt-12" data-aos="fade-up">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Berita Terbaru Lainnya</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach($recentBeritas as $recentBerita)
                                <div class="bg-white rounded-xl shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md">
                                    <a href="{{ route('berita.show', $recentBerita->slug) }}" class="block">
                                        <div class="h-40 overflow-hidden">
                                            @if($recentBerita->gambar)
                                                <img src="{{ Storage::url($recentBerita->gambar) }}" alt="{{ $recentBerita->judul }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                            @else
                                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                    <div class="p-4">
                                        <div class="text-xs text-gray-500 mb-1">{{ $recentBerita->published_at ? $recentBerita->published_at->format('d M Y') : $recentBerita->created_at->format('d M Y') }}</div>
                                        <a href="{{ route('berita.show', $recentBerita->slug) }}" class="block">
                                            <h4 class="text-lg font-semibold text-gray-800 mb-2 hover:text-green-600 transition-colors duration-300 line-clamp-2">{{ $recentBerita->judul }}</h4>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-8 text-center">
                            <a href="{{ route('berita') }}" class="inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 font-medium">
                                Lihat Semua Berita
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .prose img {
        border-radius: 0.5rem;
    }
</style>
@endpush