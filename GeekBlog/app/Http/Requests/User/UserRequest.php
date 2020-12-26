<?php

namespace App\Http\Requests\User;

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
     * @return array
     */
    public function rules()
    {
        $on_update=$this->method()=="PUT"?"":"|unique:users,email"; 
        return [
            'name'=>'required|max:50',
            'email'=>'required|email'.$on_update,
            'password'=>'required|min:12',
            'role_id'=>'required'
        ];
    }
    public function message(){
        return [
            'name.required'=>'User Name is required',
        ];
    }
}
