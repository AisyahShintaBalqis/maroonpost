<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()
            ->latest()
            ->paginate(6);

        return view('frontend.category', compact('category', 'posts'));
    }
}