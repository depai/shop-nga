<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class CategoryIndexController extends Controller
{
    public function show($id) {
        $posts = Post::with('category', 'user')->where('category_id', $id)->orderByDesc('created_at')->get();
        $data = [
            'posts' => $posts,
            'post' => $posts->first(),
            'newPosts' => Post::orderByDesc('created_at')->take(5)->get(),
        ];
        return view('posts.index', $data);
    }
}
