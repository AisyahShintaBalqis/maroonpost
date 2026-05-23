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
            ->get();

        return view('frontend.home', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('frontend.show', compact('post'));
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
}
