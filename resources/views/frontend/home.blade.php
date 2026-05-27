@extends('layouts.frontend')

@section('title', 'maroonpost - Media Online IMM Sulbar')

@section(
    'description',
    'Portal berita pers kampus, IMM, Muhammadiyah, dan informasi Sulawesi Barat.'
)

@section('content')

@if(request()->get('page', 1) == 1)
<!-- Hero -->
<section class="max-w-7xl mx-auto px-6 pt-8">

    @if($posts->count())

        <div class="relative rounded-3xl overflow-hidden shadow-xl">

            <!-- Thumbnail -->
            @if($posts[0]->thumbnail)

                <img
                    src="{{ asset('storage/' . $posts[0]->thumbnail) }}"
                    class="w-full h-[520px] object-cover"
                >

            @endif

            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent">

                <div class="absolute bottom-0 p-10 md:p-14 text-white max-w-4xl">

                    <!-- Category -->
                    <span class="inline-block bg-[#800000] px-4 py-1 rounded-full text-sm font-semibold mb-5">

                        {{ $posts[0]->category->name }}

                    </span>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">

                        <a href="/post/{{ $posts[0]->slug }}">

                            {{ $posts[0]->title }}

                        </a>

                    </h1>

                    <!-- Excerpt -->
                    <p class="text-lg text-gray-200 leading-relaxed">

                        {{ $posts[0]->excerpt }}

                    </p>

                </div>

            </div>

        </div>

    @endif

</section>
@endif

<!-- Latest News -->
<section class="max-w-7xl mx-auto px-6 pt-16 pb-20">

    <!-- Section Title -->
    <div class="flex items-center justify-between mb-10">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">
                Berita Terbaru
            </h2>

            <p class="text-gray-500 mt-2">
                Informasi terbaru dan aktual dari MaroonPost
            </p>

        </div>

    </div>

    <!-- Grid -->
    <div class="grid md:grid-cols-3 gap-8">

        @foreach(
                request()->get('page', 1) == 1
                    ? $posts->skip(1)
                    : $posts
                as $post
            )

            <article class="bg-white rounded-2xl shadow hover:shadow-xl transition duration-300 overflow-hidden">

                <!-- Thumbnail -->
                <div class="overflow-hidden">

                    <img
                        src="{{ asset('storage/' . $post->thumbnail) }}"
                        class="w-full h-56 object-cover hover:scale-105 transition duration-500"
                    >

                </div>

                <!-- Content -->
                <div class="p-6">

                    <!-- Category -->
                    <span class="text-sm text-[#800000] font-semibold">

                        {{ $post->category->name }}

                    </span>

                    <!-- Title -->
                    <h2 class="text-xl font-bold mt-3 mb-4 leading-snug">

                        <a
                            href="/post/{{ $post->slug }}"
                            class="hover:text-[#800000] transition"
                        >
                            {{ $post->title }}
                        </a>

                    </h2>

                    <!-- Excerpt -->
                    <p class="text-gray-600 text-sm leading-relaxed">

                        {{ Str::limit($post->excerpt, 120) }}

                    </p>

                    <!-- Button -->
                    <a
                        href="/post/{{ $post->slug }}"
                        class="inline-flex items-center mt-5 text-[#800000] font-semibold hover:gap-3 transition-all"
                    >
                        Baca Selengkapnya →
                    </a>

                </div>

            </article>

        @endforeach

    </div>

<!-- Pagination -->
    <div class="mt-14">

        {{ $posts->links() }}

    </div>

</section>

@endsection