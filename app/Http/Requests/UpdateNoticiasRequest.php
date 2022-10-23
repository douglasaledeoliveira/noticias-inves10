<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoticiasRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->id ?? '';

        $rules = [
            'title' => 'required|string|max:255|min:3',
            'subtitle' => 'required|string|max:128|min:3',
            'description' => ['required', 'min:3', 'max:500'],
            'image' => [
                'nullable',
                'image',
                'max:2048',
            ]
        ];
        
        return $rules;
    }
}
