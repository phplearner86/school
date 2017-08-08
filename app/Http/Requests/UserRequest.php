<?php

namespace App\Http\Requests;

use App\Services\Utilities\Gender;
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
            'role_id'=> 'required|array|exists:roles,id',
            'first_name'=> 'required|string|alpha_spaces|max:50',
            'last_name'=> 'required|string|alpha_num_spaces|max:50',
            'dob'=> 'required|date|before:-13 years',
            'gender'=> 'required|string|in:' . implode(',', array_keys(Gender::all()))
        ];
    }

}
