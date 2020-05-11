<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newPosts = Post::orderByDesc('created_at')->take(8)->get();
        $post = Post::first();
        $data = [
            'newPosts' => $newPosts,
            'post' => $post
        ];
        return view('home2', $data);
    }

    public function contact(){
        return view('User.contact');
    }

    public function newDetail(){
        return view('User.new-detail');
    }

    public function dashboard(){
        if (auth()->user()) {
            return view('Admin.Elements.master');
        }
        return redirect()->route('home');
    }
}
