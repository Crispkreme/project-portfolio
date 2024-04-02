<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string', 'max:255'],
            'about_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]; 
    }
    
    /**
     * Get custom validation messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than :max characters.',
            'subtitle.string' => 'The subtitle must be a string.',
            'subtitle.max' => 'The subtitle may not be greater than :max characters.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than :max characters.',
            'content.string' => 'The content must be a string.',
            'content.max' => 'The content may not be greater than :max characters.',
            'about_image.*.image' => 'The file must be an image.',
            'about_image.*.mimes' => 'The image must be a file of type: :values.',
            'about_image.*.max' => 'The image may not be greater than :max kilobytes.',
        ];
    }
}
