@extends('layouts.frontend')
@section('title', 'maroonpost')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-10">

    <h1 class="text-4xl font-bold text-[#800000] mb-2">
        {{ $category->name }}
    </h1>

    <p class="text-gray-600 mb-10">
        Kumpulan berita dalam kategori {{ $category->name }}
    </p>

    <div class="grid md:grid-cols-3 gap-8">

        @forelse($posts as $post)

            <div class="bg-white rounded-2xl shadow overflow-hidden">

                <img
                    src="{{ asset('storage/' . $post->thumbnail) }}"
                    class="w-full h-52 object-cover"
                >

                <div class="p-5">

                    <h2 class="text-xl font-bold mb-3">

                        <a href="/post/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>

                    </h2>

                    <p class="text-gray-600 text-sm">
                        {{ $post->excerpt }}
                    </p>

                </div>

            </div>

        @empty

            <div class="col-span-3">

                <div class="bg-white rounded-2xl shadow p-10 text-center">

                    <h2 class="text-2xl font-bold text-gray-700 mb-3">
                        Belum ada berita
                    </h2>

                </div>

            </div>

        @endforelse

    </div>

    <div class="mt-10">
        {{ $posts->links() }}
    </div>

</section>

@endsection