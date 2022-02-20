<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SendContactForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        if ($request->input('middle-name') == null) {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first-name' => ['string', 'max:25', 'min:2'],
            'last-name' => ['string', 'max:25', 'min:3'],
            'email' => 'email',
            'phone' => ['numeric', 'nullable'],
            'how-can-we-help' => ['string', 'max:500', 'min:5'],
            'how-did-you-hear-about-us' => ['string', 'min:3', 'max:100']
        ];
    }
}
