<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
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
        $post = new Post;
        $this->authorize('create', $post);

        return view('posts/form')->with('post', $post);
    }

    public function updatePost($id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);

        return view('posts/form')->with('post', $post);
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts');
    }

    public function savePost(StoreBlogPost $request)
    {
        $id = is_null($request->input('id')) ? 0 : $request->input('id');

        if($id === 0)
        {
            $post = new Post;
            $post->user_id = Auth::user()->id;
        }
        else
        {
            $post = POST::find($id);
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');

        $post->save();

        return redirect()->route('posts');
    }
}
