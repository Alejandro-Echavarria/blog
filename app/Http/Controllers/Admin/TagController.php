<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }

    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarrillo',
            'green' => 'Color verde',
            'blue' => 'Color azul',
            'indigo' => 'Color indigo',
            'purple' => 'Color morado',
            'pink' => 'Color rosado'
        ];

        return view('admin.tags.create', compact('colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);

        $tag = Tag::create($data);

        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'La etiqueta ('. $tag->name .') se creó con éxito.');
    }

    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarrillo',
            'green' => 'Color verde',
            'blue' => 'Color azul',
            'indigo' => 'Color indigo',
            'purple' => 'Color morado',
            'pink' => 'Color rosado'
        ];

        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);

        $tag->update($data);

        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta ('. $tag->name .') se actualizó con éxito.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('info', 'La etiqueta ('. $tag->name .') se eliminó con éxito.');
    }
}
