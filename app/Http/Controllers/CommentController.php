<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'name' => 'required|max:255',
            'content' => 'required',
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'name' => $request->name,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim dan menunggu moderasi.');
    }
}
