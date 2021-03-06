<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->with('user')->paginate(3);
        foreach ($posts as $post) {
            // $post->setAttribute('Auther',$post->user->name);
            $post->setAttribute('comment_count', $post->comments->count());
            $post->setAttribute('added_at', $post->created_at->diffForHumans());
        }
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //dd($post->comments);
        return response()->json([
            'id' => $post->id,
            'slug' => $post->slug,
            'body' => $post->body,
            'added_at' => $post->created_at->diffForHumans(),
            'comment_count' => $post->comments->count(),
            'image' => $post->image,
            'title' => $post->title,
            'category' => $post->category,
            'comments' => $this->commentsFormatted($post->comments),
            //'comments' => $post->comments()->get(),
            'auther' => $post->user->name
        ]);
    }
    public function commentsFormatted($comments)
    {
        $new_comments = [];
        foreach ($comments as $comment) {
            array_push($new_comments, [
                'id' => $comment->id,
                'content' => $comment->content,
                'user' => $comment->user,
                'added_at' => $comment->created_at->diffForHumans(),
            ]);
        }
        return $new_comments;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    public function searchPosts($query)
    {
        $posts = Post::where('title', 'like', '%' . $query . '%')
            ->orWhere('body', 'like', '%' . $query . '%')->with('user')->paginate(3);
        foreach ($posts as $post) {
            // $post->setAttribute('Auther',$post->user->name);
            $post->setAttribute('comment_count', $post->comments->count());
            $post->setAttribute('added_at', $post->created_at->diffForHumans());
        }
        return response()->json($posts);
    }
    public function categoryPosts($slug)
    {
        $category = Category::whereSlug($slug)->first();
        $posts = Post::whereCategoryId($category->id)->with('user')->paginate(2);
        foreach ($posts as $post) {
            // $post->setAttribute('Auther',$post->user->name);
            $post->setAttribute('comment_count', $post->comments->count());
            $post->setAttribute('added_at', $post->created_at->diffForHumans());
        }
        return response()->json($posts);
    }
}
