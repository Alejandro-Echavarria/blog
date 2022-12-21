<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $post = $this->route()->parameter('post');

        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2',
            'file' => 'image'
        ];

        if ($post) {
            
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }

        /* 
            If the status is 1, then the category_id, tags, extract, and body are required. 
        */
        if ($this->status == 1) {
            
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags'        => 'required',
                'alt'         => 'required',
                'extract'     => 'required',
                'body'        => 'required'
            ]);
        }

        return $rules;
    }
}
