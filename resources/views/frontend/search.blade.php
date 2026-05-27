@extends('layouts.frontend')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-12">

    <!-- Heading -->
    <div class="mb-10">

        <h1 class="text-4xl font-bold mb-3">

            Hasil Pencarian

        </h1>

        <p class="text-gray-600">

            Kata kunci:
            <span class="font-semibold text-[#800000]">
                "{{ $query }}"
            </span>

        </p>

    </div>

    @if($posts->count())

        <div class="grid md:grid-cols-3 gap-8">

            @foreach($posts as $post)

                <div class="bg-white rounded-2xl shadow overflow-hidden">

                    @if($post->thumbnail)

                        <img
                            src="{{ asset('storage/' . $post->thumbnail) }}"
                            class="w-full h-52 object-cover"
                        >

                    @endif

                    <div class="p-5">

                        <span class="text-sm text-[#800000] font-semibold">
                            {{ $post->category->name }}
                        </span>

                        <h2 class="text-xl font-bold mt-2 mb-3 leading-snug">

                            <a href="/post/{{ $post->slug }}">
                                {{ $post->title }}
                            </a>

                        </h2>

                        <p class="text-gray-600 text-sm">
                            {{ $post->excerpt }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-14">

            {{ $posts->appends(['q' => $query])->links() }}

        </div>

    @else

        <div class="bg-white rounded-2xl shadow p-10 text-center">

            <h2 class="text-2xl font-bold mb-3">
                Berita tidak ditemukan
            </h2>

            <p class="text-gray-600">
                Coba gunakan kata kunci lain.
            </p>

        </div>

    @endif

</section>

@endsection