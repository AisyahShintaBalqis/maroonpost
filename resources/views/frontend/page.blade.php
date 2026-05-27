@extends('layouts.frontend')

@section('title', $page->title . ' - maroonpost')

@section('description', Str::limit(strip_tags($page->content), 150))

@section('content')

<section class="max-w-7xl mx-auto px-6 pt-8">

    <div class="bg-white rounded-2xl shadow p-10">

        <h1 class="text-4xl font-bold text-[#800000] mb-8">
            {{ $page->title }}
        </h1>

        <div class="prose max-w-none">

            {!! $page->content !!}

        </div>

    </div>

</section>

@endsection