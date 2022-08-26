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
            'name' => 'required',
            'email' => 'required|unique:users|email:rfc,dns',
            'roles' => 'required',
        ];
        
        if ($user) {
            
            $rules['email'] = 'required|unique:users,email,' . $user->id; 
        }

        if (empty($user)) {

            $regex = 

            $rules = array_merge($rules, [
                'password' => 'required',
                'confirm_password' => 'required'
            ]);
        }

        return $rules;
    }
}
