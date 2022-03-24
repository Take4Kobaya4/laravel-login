<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    //
    public function showCreateForm()
    {
        return view('posts/create');
    }

    public function create(Request $request)
    {
        $post = new Post();

        $post->title = $request->title;

        $post->content = $request->content;

        $post->user_id = Auth::user()->id;

        $post->save();

        return redirect()->route('posts.detail', [
            'id' => $post->id,
        ]);
    }
    // 詳細ページ
    public function detail(Post $post)
    {
        return view('posts/detail', [
            'title' => $post->title,
            'content' => $post->content,
            'user_id' => $post->user_id,
        ]);
    }
}
