<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Neuton:400,700" rel="stylesheet">
        @if (app()->environment('production'))
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115774748-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag() { dataLayer.push(arguments) }
                gtag('js', new Date());
                gtag('config', 'UA-115774748-1');
            </script>
        @endif
    </head>
    <body class="h-screen flex flex-col">
        @yield('content')
        @include('includes.footer')
        @stack('scripts')
    </body>
</html>
