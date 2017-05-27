<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Routing\Redirector;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts/index')->with([
            'posts' => $posts
        ]);
    }

    public function post($id)
    {
        $post = $id > 0 ? POST::where(['id' => $id])->first() : $post = new POST;
        return view('posts/form')->with('post', $post);
    }

    public function deletePost($id)
    {
        $post = POST::where(['id' => $id])->first();
        $post->delete();

        return redirect()->route('posts');
    }

    public function savePost(Request $request)
    {
        $post = $request->input('id') > 0 ? POST::where(['id' => $request->input('id')])->first() : new POST;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect()->route('posts');
    }
}
