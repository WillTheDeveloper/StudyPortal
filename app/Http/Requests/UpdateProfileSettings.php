<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileSettings extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'string|nullable|min:2|max:20',
            'bio' => 'string|nullable|min:2|max:60'
        ];
    }

    public function messages()
    {
        return [
            'username.min' => "Username must be more than 2 characters",
            'username.max' => "Username cannot be more than 20 characters"
        ];
    }
}
