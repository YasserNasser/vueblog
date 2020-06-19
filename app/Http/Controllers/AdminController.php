<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __constract(){
        $this->middleware('admin');
    }
    public function getPost(){
        $posts = Post::latest()->with('user')->paginate(3);
        foreach ($posts as $post) {
            $post->setAttribute('comment_count', $post->comments->count());
            $post->setAttribute('added_at', $post->created_at->diffForHumans());
            $post->setAttribute('category', $post->category);
        }
        return response()->json($posts);
    }
}
