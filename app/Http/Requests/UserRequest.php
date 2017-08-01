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
     * @return array
     */
    public function rules()
    {
        return [
            'role_id'=> 'required|exists:roles,id',
            'first_name'=> 'required|alpha|max:50',
            'last_name'=> 'required|alpha_dash|max:50',
            'dob'=> 'required|date|before:today',
        ];
    }

}
