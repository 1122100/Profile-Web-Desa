@props(['title' => config('app.name'), 'description' => 'Website resmi Desa yang menyediakan informasi tentang desa, kegiatan, berita, dan layanan masyarakat.', 'keywords' => 'desa, website desa, pemerintah desa, berita desa, layanan desa', 'ogImage' => null, 'canonicalUrl' => null])

<!-- Primary Meta Tags -->
<title>{{ $title }}</title>
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">

<!-- Canonical URL -->
@if($canonicalUrl)
<link rel="canonical" href="{{ $canonicalUrl }}" />
@else
<link rel="canonical" href="{{ url()->current() }}" />
@endif

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
@if($ogImage)
<meta property="og:image" content="{{ $ogImage }}">
@endif

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:description" content="{{ $description }}">
@if($ogImage)
<meta property="twitter:image" content="{{ $ogImage }}">
@endif

<!-- Additional SEO Meta Tags -->
<meta name="robots" content="index, follow">
<meta name="language" content="Indonesian">
<meta name="revisit-after" content="7 days">
<meta name="author" content="{{ config('app.name') }}">