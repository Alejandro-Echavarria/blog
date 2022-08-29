<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $user = $this->route()->parameter('user');

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email:rfc,dns|max:255',
            'roles' => 'required'
        ];
        
        if ($user) {
            
            $rules['email'] = 'required|max:255|email:rfc,dns|unique:users,email,' . $user->id; 
        }

        if (empty($user)) {

            $regex = 

            $rules = array_merge($rules, [
                'password' => 'required|max:255|min:5',
                'confirm_password' => 'required|max:255|min:5'
            ]);
        }

        return $rules;
    }
}
