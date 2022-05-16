<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

// Import of validation file
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $data = $request->all();
        // $data['user_id'] = auth()->user()->id;

        $post = Post::create($data);

        // Validamos si existe una imagen en la petición
        if ($request->file('file')) {
            
            $url = Storage::put('posts', $request->file('file'));

            // Guardamos el archivo
                // Llamamos la relacion de post e image
            $post->image()->create([
                'url' => $url
            ]);
        }

        // Validamos si existe tags en la petición
        if ($request->tags) {
            
            /* Llamamos a la relaci►2n tags y le pasamos el metodo attach
                pasandole los tags de la variable o objeto request
            */
            $post->tags()->attach($request->tags);
        }

        // Redireccionamos al post creado
        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());
        
        // Validamos si existe una imagen en la petición
        if ($request->file('file')) {
            
            $url = Storage::put('posts', $request->file('file'));

            // Indicamos que si existe una imagen la eliminemos
            if ($post->image) {
                
                Storage::delete($post->image->url);
                
                // Editamos el archivo
                $post->image->update([
                    'url' => $url
                ]);
            }else{// En el caso de no existir una imagen asociada
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        // Validamos si existe tags en la petición
        if ($request->tags) {
            
            /* Llamamos a la relaci►2n tags y le pasamos el metodo attach
                pasandole los tags de la variable o objeto request
            */
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se actualizó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('info', 'El post eliminó con éxito.');
    }
}
