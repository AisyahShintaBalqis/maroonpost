<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <a href="/" class="text-3xl font-bold text-red-700">
                MaroonPost
            </a>

            <div class="space-x-6">
                <a href="/" class="hover:text-red-600">Home</a>
            </div>

        </div>
    </nav>

    <!-- Article -->
    <section class="max-w-5xl mx-auto mt-10 mb-16">

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            @if($post->thumbnail)
                <img
                    src="{{ asset('storage/' . $post->thumbnail) }}"
                    class="w-full h-[500px] object-cover"
                >
            @endif

            <div class="p-10">

                <!-- Category -->
                <p class="text-red-600 font-semibold mb-3">
                    {{ $post->category->name }}
                </p>

                <!-- Title -->
                <h1 class="text-5xl font-bold leading-tight mb-6">
                    {{ $post->title }}
                </h1>

                <!-- Meta -->
                <div class="text-gray-500 mb-8">
                    Dipublikasikan
                    {{ $post->created_at->format('d F Y') }}
                </div>

                <!-- Content -->
                <div class="prose prose-lg max-w-none">
                    {!! nl2br(e($post->content)) !!}
                </div>

            </div>

        </div>

    </section>

<!-- Footer -->
<footer class="bg-white border-t mt-16">

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="grid md:grid-cols-3 gap-10">

            <!-- Brand -->
            <div>

                <h2 class="text-2xl font-bold text-[#800000] mb-4">
                    MaroonPost
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Portal berita pers kampus yang menyajikan informasi,
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