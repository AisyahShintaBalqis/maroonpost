@section('og_title', $post->title)

@section('og_description', $post->excerpt)

@section('og_image', asset('storage/' . $post->thumbnail))

@extends('layouts.frontend')
@section('title', 'maroonpost')

@section('content')

<section class="max-w-7xl mx-auto px-6 pt-8">

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <img
            src="{{ asset('storage/' . $post->thumbnail) }}"
            class="w-full h-96 object-cover"
        >

        <div class="p-10">

            <span class="text-sm text-[#800000] font-semibold">
                {{ $post->category->name }}
            </span>

            <h1 class="text-5xl font-bold leading-tight mt-3 mb-6">
                {{ $post->title }}
            </h1>

            <div class="text-gray-500 text-sm mb-8">

                Dipublikasikan:
                {{ $post->created_at->format('d M Y') }}

            </div>

            <!-- Share Buttons -->
            <div class="flex items-center gap-4 mt-6 mb-10">

                <span class="font-semibold text-gray-700">
                    Bagikan:
                </span>

                <!-- WhatsApp -->
                <a
                    href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}"
                    target="_blank"
                    class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-sm font-semibold hover:bg-green-200 transition"
                >
                    WhatsApp
                </a>

                <!-- Facebook -->
                <a
                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                    target="_blank"
                    class="bg-blue-100 text-blue-700 px-4 py-2 rounded-xl text-sm font-semibold hover:bg-blue-200 transition"
                >
                    Facebook
                </a>

                <!-- Twitter/X -->
                <a
                    href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}"
                    target="_blank"
                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-xl text-sm font-semibold hover:bg-gray-300 transition"
                >
                    X / Twitter
                </a>

            </div>

            <div class="prose max-w-none">

                {!! $post->content !!}

            </div>

        </div>

    </div>

</section>


<!-- Comment Section -->
<section class="max-w-7xl mx-auto px-6 pt-8">

    <div class="bg-white rounded-3xl shadow p-8 md:p-10">

        <!-- Heading -->
        <div class="mb-10">

            <h2 class="text-3xl font-bold text-gray-900 mb-3">
                Diskusi & Komentar
            </h2>

            <p class="text-gray-500">
                Berikan pendapatmu terkait berita ini secara bijak dan santun.
            </p>

        </div>

        <!-- Success Message -->
        @if(session('success'))

            <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl mb-8">

                {{ session('success') }}

            </div>

        @endif

        <!-- Comment Form -->
        <form action="/comment" method="POST" class="space-y-6">

            @csrf

            <input
                type="hidden"
                name="post_id"
                value="{{ $post->id }}"
            >

            <!-- Name -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    placeholder="Masukkan nama"
                    class="w-full border border-gray-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#800000]"
                    required
                >

            </div>

            <!-- Comment -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Komentar
                </label>

                <textarea
                    name="content"
                    rows="6"
                    placeholder="Tulis komentar..."
                    class="w-full border border-gray-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#800000] resize-none"
                    required
                ></textarea>

            </div>

            <!-- Button -->
            <div>

                <button
                    type="submit"
                    class="bg-[#800000] hover:bg-[#660000] transition text-white font-semibold px-8 py-4 rounded-2xl"
                >
                    Kirim Komentar
                </button>

            </div>

        </form>

        <!-- Divider -->
        <div class="border-t my-12"></div>

        <!-- Comment List -->
        <div class="space-y-8">

            <h3 class="text-2xl font-bold text-gray-900">
                Komentar Pembaca
            </h3>

            @forelse($post->comments->where('is_approved', true) as $comment)

                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-6">

                    <!-- Header -->
                    <div class="flex items-center justify-between mb-4">

                        <div>

                            <h4 class="font-bold text-lg text-gray-900">

                                {{ $comment->name }}

                            </h4>

                            <p class="text-sm text-gray-500 mt-1">

                                {{ $comment->created_at->format('d M Y') }}

                            </p>

                        </div>

                    </div>

                    <!-- Content -->
                    <p class="text-gray-700 leading-relaxed">

                        {{ $comment->content }}

                    </p>

                </div>

            @empty

                <div class="bg-gray-50 rounded-2xl p-10 text-center">

                    <h3 class="text-xl font-bold text-gray-700 mb-3">
                        Belum ada komentar
                    </h3>

                    <p class="text-gray-500">
                        Jadilah orang pertama yang memberikan komentar.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>


@endsection