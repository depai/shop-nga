<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newPosts = Post::orderByDesc('created_at')->take(5)->get();
        $category = Category::with('posts')->where('name', 'dịch vụ doanh nghiệp')->first();
        $data = [
            'newPosts' => $newPosts,
            'posts' => !empty($category) ? $category->posts : []
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
