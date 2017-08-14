<title>{{$content->title . ' | ' . env('APP_TITLE') }}</title>
<meta name="description" content="Автосервис на окружной в Киеве">
<meta name="keywords" content="{{ $content->keywords }}">
<link rel="canonical" href="{{ url('/') }}"/>
<meta property="og:type" content="product.group">
<meta property="og:title" content="{{ $content->title }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('storage/services/'. $content->img) }}">
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "brand": {
    "@type": "Thing",
    "name": "{{ env('APP_TITLE') }}"
  },
  "name": "{{ $content->title }}",
  "image": "{{ asset('storage/blog/img_main/' . $content->img_main) }}",
  "description": "{{ $content->desc }}",
  "productId": "upc:",
  "offers": {
    "@type": "AggregateOffer",
    "priceCurrency" : "0.00",
    "lowPrice": "0.00",
    "itemCondition": "new"
  }
}
</script>