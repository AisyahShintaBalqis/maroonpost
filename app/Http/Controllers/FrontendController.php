<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class FrontendController extends Controller
{
     public function index()
    {
            $posts = Post::with('category')
            ->where('status', 'published')
            ->latest()
            ->paginate(9);

        return view('frontend.home', compact('posts'));
    }

    public function show($slug)
    {
            $post = Post::with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedPosts = Post::with('category')
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.show', compact('post', 'relatedPosts'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = Post::where('category_id', $category->id)
            ->where('status', 'published')
            ->latest()
            ->get();

        return view('frontend.category', compact('category', 'posts'));
    }

    public function search(Request $request)
    {
        $query = $request->q;

        $posts = Post::with('category')
            ->where('status', 'published')
            ->where(function ($builder) use ($query) {

                $builder->where('title', 'like', "%{$query}%")
                    ->orWhere('excerpt', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%");

            })
            ->latest()
            ->paginate(9);

        return view('frontend.search', compact('posts', 'query'));
    }
}
