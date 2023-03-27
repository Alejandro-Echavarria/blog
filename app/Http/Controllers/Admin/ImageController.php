<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        /* Creating a directory called posts in the storage folder. */
        Storage::makeDirectory('ckeditor/images');

        $name = Str::random(10) . $request->file('upload')->getClientOriginalName();
        $path = storage_path('app/public/ckeditor/images/' . $name);
        $pathRelative = 'ckeditor/images/' . $name;

        $img = Image::make($request->file('upload'))
                ->resize(1200, 800, function($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($path);

        return [
            'url' => Storage::url($pathRelative)
        ];
    }
}
