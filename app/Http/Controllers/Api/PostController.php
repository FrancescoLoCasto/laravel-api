<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('technologies', 'type')->get();

        return response()->json([
            'succes' => true,
            'results' => $posts,
        ]);
    }

    public function show(Post $post){
        $post = Post::with('technologies', 'type')->findOrFail($post->id);
        return response()->json([
            'succes' => true,
            'results' => $post,
        ]);
    }
}
