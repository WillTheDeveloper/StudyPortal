<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewAssignment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->is_tutor;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:2|max:40',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "A title is required to create an assignment",
            'title.min' => "Title must be at least 2 characters",
            'title.max' => "Title must be less than 40 characters",
        ];
    }
}
