<title>{{$content->title . ' | ' . env('APP_TITLE') }}</title>
<meta name="description" content="Автосервис на окружной в Киеве">
<meta name="keywords" content="{{ $content->keywords }}">
<link rel="canonical" href="{{ url('/') }}"/>
<meta property="og:type" content="article">
<meta property="og:title" content="{{ $content->title }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('storage/blog/img_main/' . $content->img_main) }}">
<meta property="article:author" content="{{ env('APP_TITLE') }}">
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "NewsArticle",
  "headline": "{{ $content->title }}",
  "datePublished": "{{ $content->created_at }}",
  "description": "{{ $content->desc }}",
  "image": {
    "@type": "ImageObject",
    "url": "{{ asset('storage/blog/img_main'. '/' . $content->img_main) }}"
  },
  "author": "{{ env('APP_TITLE') }}",
  "publisher": {
    "@type": "Organization",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ url('/') }}"
    },
    "name": "{{ env('APP_TITLE') }}"
  },
  "articleBody": "{{ $content->text }}"
}
</script>