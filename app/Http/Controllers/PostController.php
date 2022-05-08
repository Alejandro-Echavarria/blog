<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        $posts = Post::where('status', 1)->latest('id')->paginate(9);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
        
        $similars = Post::where('category_id', $post->category_id)
                       ->where('status', 1)// Indicamos que solo queremos posts activos
                       ->where('id', '!=', $post->id)// Indicamos que sean diferentes al que mandamos
                       ->latest('id')// Ordenamos por id
                       ->take(4)// indicamos que solo queremos los primeros 4
                       ->get();

        return view('posts.show', compact('post', 'similars'));
    }
}
