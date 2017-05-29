<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
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

    public function newPost()
    {
        $post = new POST;
        $this->authorize('create', $post);

        return view('posts/form')->with('post', $post);
    }

    public function updatePost($id)
    {
        $post = POST::where(['id' => $id])->first();
        $this->authorize('update', $post);

        return view('posts/form')->with('post', $post);
    }

    public function deletePost($id)
    {
        $post = POST::where(['id' => $id])->first();
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts');
    }

    public function savePost(Request $request)
    {
        $id = $request->input('id') === null ? 0 : $request->input('id');
        $post = $id === 0 ? new POST : POST::where(['id' => $request->input('id')])->first();

        $post->title = $request->input('title');
        $post->content = $request->input('content');

        if($id === 0)
            $post->user_id = Auth::user()->id;

        $post->save();

        return redirect()->route('posts');
    }
}
