<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta property="og:title" content="@yield('og_title', 'MaroonPost')" />

    <meta property="og:description" content="@yield('og_description', 'Portal Berita Pers Kampus')" />

    <meta property="og:image" content="@yield('og_image', asset('images/logo.png'))" />

    <meta property="og:type" content="website" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'maroonpost')</title>

    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/fav-icon.jpeg') }}"
    >

    @vite('resources/css/app.css')



</head>

<body class="bg-gray-100">

    @include('partials.navbar')

    <main>

        @yield('content')

    </main>

    @include('partials.footer')

</body>

</html>