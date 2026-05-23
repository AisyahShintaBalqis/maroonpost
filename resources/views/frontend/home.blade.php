<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaroonPost</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <h1 class="text-3xl font-bold text-red-700">
                Maroon Post
            </h1>

            <div class="space-x-6">
                <a href="/" class="hover:text-red-600">Home</a>
                <a href="#" class="hover:text-red-600">Berita</a>
                <a href="#" class="hover:text-red-600">Opini</a>
            </div>

        </div>
    </nav>

    <!-- Hero -->
    <section class="max-w-7xl mx-auto px-6 mt-8">

        @if($posts->count())

            <div class="bg-white rounded-xl shadow overflow-hidden">

                @if($posts[0]->thumbnail)
                    <img
                        src="{{ asset('storage/' . $posts[0]->thumbnail) }}"
                        class="w-full h-[450px] object-cover"
                    >
                @endif

                <div class="p-8">

                    <p class="text-red-600 font-semibold mb-2">
                        {{ $posts[0]->category->name }}
                    </p>

                    <h2 class="text-4xl font-bold mb-4">
                        <a href="/post/{{ $posts[0]->slug }}">
                            {{ $posts[0]->title }}
                        </a>
                    </h2>

                    <p class="text-gray-600 text-lg">
                        {{ $posts[0]->excerpt }}
                    </p>

                </div>

            </div>

        @endif

    </section>

    <!-- News Grid -->
    <section class="max-w-7xl mx-auto px-6 mt-10 mb-10">

        <h2 class="text-2xl font-bold mb-6">
            Berita Terbaru
        </h2>

        <div class="grid md:grid-cols-3 gap-8">

            @foreach($posts->skip(1) as $post)

                <div class="bg-white rounded-xl shadow overflow-hidden">

                    @if($post->thumbnail)
                        <img
                            src="{{ asset('storage/' . $post->thumbnail) }}"
                            class="w-full h-52 object-cover"
                        >
                    @endif

                    <div class="p-5">

                        <p class="text-sm text-red-600 font-semibold mb-2">
                            {{ $post->category->name }}
                        </p>

                        <h3 class="text-xl font-bold mb-3">
                            <a href="/post/{{ $post->slug }}">
                                {{ $post->title }}
                            </a>
                        </h3>

                        <p class="text-gray-600 text-sm">
                            {{ Str::limit($post->excerpt, 100) }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </section>

<!-- Footer -->
<footer class="bg-white border-t mt-16">

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="grid md:grid-cols-3 gap-10">

            <!-- Brand -->
            <div>

                <h2 class="text-2xl font-bold text-[#800000] mb-4">
                    Maroon Post
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Portal berita Pers kader IMM Sulbar menyajikan informasi,
                    opini, dan literasi mahasiswa secara kritis dan aktual.
                </p>

            </div>

            <!-- Navigation -->
            <div>

                <h3 class="font-bold text-lg mb-4">
                    Navigasi
                </h3>

                <ul class="space-y-2 text-gray-600">

                    <li>
                        <a href="/" class="hover:text-[#800000]">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#" class="hover:text-[#800000]">
                            Berita
                        </a>
                    </li>

                    <li>
                        <a href="#" class="hover:text-[#800000]">
                            Opini
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Contact -->
            <div>

                <h3 class="font-bold text-lg mb-4">
                    Kontak
                </h3>

                <p class="text-gray-600">
                    MaroonPost-Media IMM Sulbar
                </p>

                <p class="text-gray-600">
                    Sulawesi Barat
                </p>

                <p class="text-gray-600 mt-2">
                    maroonpost@gmail.com
                </p>

            </div>

        </div>

        <!-- Bottom -->
        <div class="border-t mt-10 pt-6 text-center text-sm text-gray-500">

            © 2026 MaroonPost — Media IMM Sulbar "Bergerak, Berdaya, Berdampak"

        </div>

    </div>

</footer>

</body>
</html>