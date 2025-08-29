@props(['berita'])

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "NewsArticle",
    "headline": "{{ $berita->judul }}",
    "description": "{{ Str::limit(strip_tags($berita->konten), 160) }}",
    "image": [
        "{{ $berita->gambar ? url(Storage::url($berita->gambar)) : url('/images/default-news.jpg') }}"
    ],
    "datePublished": "{{ $berita->published_at ? $berita->published_at->toIso8601String() : $berita->created_at->toIso8601String() }}",
    "dateModified": "{{ $berita->updated_at->toIso8601String() }}",
    "author": {
        "@type": "Person",
        "name": "{{ $berita->user->name }}"
    },
    "publisher": {
        "@type": "Organization",
        "name": "{{ config('app.name') }}",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ url('/images/logo.png') }}"
        }
    },
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ route('berita.show', $berita->slug) }}"
    }
}
</script>