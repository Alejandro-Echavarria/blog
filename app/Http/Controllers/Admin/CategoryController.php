<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.categories.edit')->only('edit', 'update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }

    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);

        $category = Category::create($data);

        return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoría ('. $category->name .') se creó con éxito.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,slug,$category->id",
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);

        $category->update($data);

        return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoría ('. $category->name .') se actualizó con éxito.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('info', 'La categoría ('. $category->name .') se eliminó con éxito.');
    }
}
