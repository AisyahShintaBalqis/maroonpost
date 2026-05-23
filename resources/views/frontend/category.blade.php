<!DOCTYPE html>
<html>
<head>
    <title>{{ $category->name }}</title>
</head>
<body>

    <h1>Kategori: {{ $category->name }}</h1>

    @foreach($posts as $post)

        <div style="margin-bottom: 30px;">

            <h2>
                <a href="/post/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h2>

            <p>{{ $post->excerpt }}</p>

        </div>

    @endforeach

</body>
</html>