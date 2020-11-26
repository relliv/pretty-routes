<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

    <title>{{ \PrettyRoutes\Facades\Trans::get('title') }} | {{ config('app.name') }}</title>

    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
</head>
<body>

<div id="app"></div>

<script>
    window.trans = {!! json_encode(\PrettyRoutes\Facades\Trans::all(), JSON_UNESCAPED_UNICODE) !!};
    window.dark = '{{ config("pretty-routes.color_scheme", "auto") }}';
    window.routesUrl = '{{ route("pretty-routes.list") }}';
</script>

<script src="https://cdn.jsdelivr.net/gh/andrey-helldar/pretty-routes-frontend@1.21/dist/app.js"></script>

</body>
</html>
