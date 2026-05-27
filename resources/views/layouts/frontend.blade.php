<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <!-- SEO -->
    <title>
        @yield('title', 'MaroonPost')
    </title>

    <meta
        name="description"
        content="@yield(
            'description',
            'Portal berita pers kampus, IMM, Muhammadiyah, dan informasi Sulawesi Barat.'
        )"
    >

    <meta
        name="keywords"
        content="IMM, Muhammadiyah, Pers Kampus, Sulawesi Barat, Berita Kampus"
    >

    <meta
        name="author"
        content="MaroonPost"
    >

    <meta
        name="robots"
        content="index, follow"
    >

    <!-- Canonical -->
    <link
        rel="canonical"
        href="{{ url()->current() }}"
    >

    <!-- Favicon -->
    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/fav-icon.jpeg') }}"
    >

    <!-- Open Graph -->
    <meta
        property="og:title"
        content="@yield('title', 'MaroonPost')"
    >

    <meta
        property="og:description"
        content="@yield(
            'description',
            'Portal berita pers kampus dan media online IMM.'
        )"
    >

    <meta
        property="og:type"
        content="website"
    >

    <meta
        property="og:url"
        content="{{ url()->current() }}"
    >

    <meta
        property="og:image"
        content="@yield(
            'image',
            asset('images/maroon-logo.png')
        )"
    >

    <!-- Twitter Card -->
    <meta
        name="twitter:card"
        content="summary_large_image"
    >

    <meta
        name="twitter:title"
        content="@yield('title', 'MaroonPost')"
    >

    <meta
        name="twitter:description"
        content="@yield(
            'description',
            'Portal berita pers kampus dan media online IMM.'
        )"
    >

    <meta
        name="twitter:image"
        content="@yield(
            'image',
            asset('images/maroon-logo.png')
        )"
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