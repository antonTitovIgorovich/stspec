<title> Контакт | {{ env('APP_TITLE') }}</title>
<meta name="description" content="Автосервис на окружной в Киеве">
<meta name="keywords" content="автосервис, Киев, окружная, окружной, ремонт машин, субару, subaru, тюнинг">
<link rel="canonical" href="{{ url('/') }}"/>
<meta prerty="og:site_name" content="{{ env('APP_TITLE') }}"/>
<meta property="og:type" content="business.business">
<meta property="og:title" content="{{ env('APP_TITLE') }}">
<meta property="og:description" content="Автосервис на окружной в Киеве"/>
<meta property="og:url" content="{{ url('/') }}"/>
<meta property="og:image" content="{{ asset('images/s_logo.svg') }}"/>
<meta property="business:contact_data:street_address" content="Б.Окружная 4-б">
<meta property="business:contact_data:locality" content="Киев Большая Окружная">
<meta property="business:contact_data:region" content="Киевская область">
<meta property="business:contact_data:postal_code" content="02095">
<meta property="business:contact_data:country_name" content="Киев">
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Organization",
  "name": "{{ env('APP_TITLE') }}",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Б.Окружная 4-б",
    "addressLocality": "Киев Большая Окружная",
    "addressRegion": "Киевская область",
    "postalCode": "02095"
  },
  "telephone": "(068)502-28-82 "
}

</script>