<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewGroup extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() and auth()->user()->is_tutor;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'groupname' => 'required|string|min:2|max:20',
            'subject' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'groupname.required' => 'Please enter a group name',
            'groupname.string' => 'Group name must be a string',
            'groupname.min' => 'Group name must be at least 2 characters',
            'groupname.max' => 'Group name cannot exceed 20 characters',

            'subject.required' => 'Please select a valid subject in dropdown'
        ];
    }
}
