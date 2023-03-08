<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageSizeValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'image_a_width' => 'required|integer',
            'image_a_height' => 'required|integer',
            'image_b_width' => 'required|integer',
            'image_b_height' => 'required|integer',
        ];
    }
}
