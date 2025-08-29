<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Static Pages -->
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/profil') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/berita') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/kontak') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>

    <!-- Berita Pages -->
    @foreach ($beritas as $berita)
    <url>
        <loc>{{ route('berita.show', $berita->slug) }}</loc>
        <lastmod>{{ $berita->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    <!-- Dusun Pages -->
    @foreach ($dusuns as $dusun)
    <url>
        <loc>{{ url('/dusun/' . $dusun->id) }}</loc>
        <lastmod>{{ $dusun->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach

    <!-- Lembaga Pages -->
    @foreach ($lembagas as $lembaga)
    <url>
        <loc>{{ url('/lembaga/' . $lembaga->id) }}</loc>
        <lastmod>{{ $lembaga->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach

    <!-- Pertanian Pages -->
    @foreach ($pertanians as $pertanian)
    <url>
        <loc>{{ url('/pertanian/' . $pertanian->id) }}</loc>
        <lastmod>{{ $pertanian->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach

    <!-- UMKM Pages -->
    @foreach ($umkms as $umkm)
    <url>
        <loc>{{ url('/umkm/' . $umkm->id) }}</loc>
        <lastmod>{{ $umkm->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
</urlset>