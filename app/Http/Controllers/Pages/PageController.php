<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homePage()
    {
        return view('pages.home');
    }

public function fetchUserPost(string $id)
{
    $post = Post::with('user')->findOrFail($id);
    return view('pages.post', compact('post'));
}
}
