<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

// Import of validation file
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->all();

        $post = Post::create($data);

        // Validamos si existe una imagen en la petición
        if ($request->file('file')) {
            
            $name = str_replace(" ", "", Str::random(10) . $request->file('file')->getClientOriginalName());
            $path = storage_path('app/public/posts/' . $name);
            $pathRelative = 'posts/' . $name;

            Storage::makeDirectory('posts');

            $img = Image::make($request->file('file'))
                ->resize(1200, null, function($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($path);

            // Guardamos el archivo
                // Llamamos la relacion de post e image
            $post->image()->create([
                'url' => $pathRelative
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
        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se creó con éxito.');
    }

    public function edit(Post $post)
    {
        $this->authorize('author', $post);

        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);

        $post->update($request->all());
        
        // Validamos si existe una imagen en la petición
        if ($request->file('file')) {
            
            $name = str_replace(" ", "", Str::random(10) . $request->file('file')->getClientOriginalName());
            $path = storage_path('app/public/posts/' . $name);
            $pathRelative = 'posts/' . $name;

            Storage::makeDirectory('posts');

            $img = Image::make($request->file('file'))
                ->resize(1200, null, function($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($path);

            // Indicamos que si existe una imagen la eliminemos
            if ($post->image) {
                
                Storage::delete($post->image->url);
                
                // Editamos el archivo
                $post->image->update([
                    'url' => $pathRelative
                ]);
            }else{// En el caso de no existir una imagen asociada
                $post->image()->create([
                    'url' => $pathRelative
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

    public function destroy(Post $post)
    {
        $this->authorize('author', $post);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('info', 'El post eliminó con éxito.');
    }
}
