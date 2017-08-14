<title>Блог | {{ env('APP_TITLE') }}</title>
<meta name="description" content="Автосервис на окружной в Киеве">
<meta name="keywords" content="автосервис, Киев, окружная, окружной, ремонт машин, субару, subaru, тюнинг">
<link rel="canonical" href="{{ url('/') }}"/>
<meta property="og:title" content="Блог"/>
<meta property="og:description" content="Блог {{ env('APP_TITLE') }}"/>
<meta property="og:url" content="{{ url()->current() }}"/>
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="{{ env('APP_TITLE') }}"/>
<meta property="og:image" content="{{ asset('images/s_logo.svg') }}"/>
<script type='application/ld+json'>
{
  "@context": "http://www.schema.org",
  "@type": "WebSite",
  "name": "Блог | {{ env('APP_TITLE') }}",
  "alternateName": "Сервис Тюнинг Спец",
  "url": "{{ url()->current() }}"
}
</script>