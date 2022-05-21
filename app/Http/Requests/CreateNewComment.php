<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewComment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() and !auth()->user()->is_banned;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comment' => 'required|string|min:3|max:35'
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => "A comment is required",
            'comment.min' => "Comments must be more than 3 characters",
            'comment.max' => "Comments must be less than 35 characters"
        ];
    }
}
