<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //show all post
    public function index(){
        return Post::all();
    }

    //add post
    public function addPost(PostRequest $request) {
        $data = $request->all();
        $post = Post::create($data);
        if ($post) {
            return response()->json([
                'status' => 200,
                'message' => 'Tạo bài viết thành công!'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Tạo bài viết thất bại!'
            ]);
        }
    }

    //edit post
    public function editPost($id) {
        $post = Post::find($id);
        return response($post);
    }

    //update post
    public function updatePost(PostRequest $request, $id) {
        $post = Post::findOrFail($id);
        if ($post) {
            $post->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật bài viết thành công!'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'error' => 'Cập nhật bài viết thất bại!'
            ]);
        }
    }

    //delete post
    public function deletePost($id) {
        $post = Post::find($id);
        $deletePost = $post->delete($id);
        if ($deletePost) {
            return response()->json([
                'status' => 200,
                'message' => 'Xoá bài viết thành công!'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'error' => 'Xoá bài viết thất bại!'
            ]);
        }
        
    }
}