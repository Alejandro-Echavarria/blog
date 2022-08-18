<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
class PostController extends Controller
{
    public function index(){

        $posts = Post::where('status', 1)->latest('id')->paginate(9);
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.index', compact('posts', 'categories', 'tags'));
    }

    public function show(Post $post){
        
        $this->authorize('published', $post);

        $similars = Post::where('category_id', $post->category_id)
                        ->where('status', 1)// Indicamos que solo queremos posts activos
                        ->where('id', '!=', $post->id)// Indicamos que sean diferentes al que mandamos
                        ->latest('id')// Ordenamos por id
                        ->take(4)// indicamos que solo queremos los primeros 4
                        ->get();

        return view('posts.show', compact('post', 'similars'));
    }

    public function category(Category $category){

        $posts = Post::where('category_id', $category->id)
                     ->where('status', 1)
                     ->latest('id')
                     ->paginate(6);

        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.category', compact('posts', 'category', 'categories', 'tags'));
    }

    public function tag(Tag $tag){
        
        $posts = $tag->posts()
                     ->where('status', 1)
                     ->latest('id')
                     ->paginate(6);

        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.tag', compact('posts', 'tag', 'categories', 'tags'));
    }
}
