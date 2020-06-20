<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __constract(){
        $this->middleware('admin');
    }
    public function getPost(){
        $posts = Post::latest()->with('user')->paginate(5);
        foreach ($posts as $post) {
            $post->setAttribute('comment_count', $post->comments->count());
            $post->setAttribute('added_at', $post->created_at->diffForHumans());
            $post->setAttribute('category', $post->category);
        }
        return response()->json($posts);
    }
    public function getCategories(){
        $categories = Category::all();
        return response()->json($categories);
    }
    public function addPost(Request $request){
        $filename="";
        if($request->hasFile('image')){
            $filename = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('img'),$filename);
        }
        $post = Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'category_id'=>$request->category,
            'user_id'=>Auth::id(),
            'image'=>$filename,
            'slug'=>Str::slug($request->title),
        ]);

        return response()->json($post);
    }
    public function updatePost(Request $request){
        $post = Post::find($request->id);
        $filename=$post->image;
        if($request->hasFile('image')){
            $filename = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('img'),$filename);
        }
        
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->image = $filename;
        $post->user_id = Auth::id();
        $post->slug = Str::slug($request->title);
        $post ->save();

        return response()->json($post);
    }
    public function deletePosts(Request $request){
        $ids = $request->posts_ids;
        Post::whereIn('id',$ids)->delete();
        return response()->json(['message'=>'Posts Deleted Successfully']);
    }
    public function deletePost($postId){
       
        Post::find($postId)->delete();
        return response()->json(['message'=>'Post Deleted Successfully']);
    }
}
