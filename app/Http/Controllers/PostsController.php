<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RequestStack;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('filter_posts_by_user_id'))
            $posts = Post::where([
                'user_id' => Auth::user()->id
            ])->get();
        else
            $posts = Post::all();

        return view('home')->with([
            'posts' => $posts
        ]);
    }

    public function filterByUserId(Request $request)
    {
        if($request->session()->has('filter_posts_by_user_id'))
            $request->session()->forget('filter_posts_by_user_id');
        else
            $request->session()->put('filter_posts_by_user_id', true);

        return redirect()->route('posts');
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

    public function deletePost($id, Request $request)
    {
        $post = Post::find($id);
        $this->authorize('delete', $post);
        $post->delete();

        //Message success
        $request->session()->flash('message', '<strong>Concluído!</strong> Post removido com sucesso.');

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

        //Message success
        $request->session()->flash('message', '<strong>Tudo ok!</strong> Post salvo com sucesso.');

        return redirect()->route('posts');
    }
}
