<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewPost extends FormRequest
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
            'title' => 'required|string',
            'text' => 'required|string',
            'subject' => 'required|integer',
            'tag' => 'nullable|integer'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Enter a post title",
            'text.required' => "Enter a body for your post",
            'subject.required' => "Select a subject for this post"
        ];
    }
}
