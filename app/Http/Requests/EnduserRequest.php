<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnduserRequest extends FormRequest
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
        return [
            'fullname' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|size:11',
            'password' => 'required|confirmed|min:6'
        ];
    }
}