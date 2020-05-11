<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class CategoryIndexController extends Controller
{
    public function show($id) {
        $post = Post::with('category', 'user')->where('category_id', $id)->first();
        $data = [
            'post' => $post
        ];
        return view('posts.index', $data);
    }
}
