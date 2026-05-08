<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'=> 'required',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return[
    'email.required'=>'Email Harus Diisi',
    'password.required'=>'Password Harus Diisi'
    ];
    }
    

}
