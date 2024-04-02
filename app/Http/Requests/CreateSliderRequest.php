<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSliderRequest extends FormRequest
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
            'subtitle' => ['required', 'string', 'max:255'],
            'images' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'video_url' => ['required', 'url'],
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
            'sub_title.required' => 'The sub title field is required.',
            'sub_title.string' => 'The sub title must be a string.',
            'sub_title.max' => 'The sub title may not be greater than :max characters.',
            'images.required' => 'At least one image is required.',
            'images.array' => 'The images must be an array.',
            'images.*.image' => 'The file must be an image.',
            'images.*.mimes' => 'The image must be a file of type: :values.',
            'images.*.max' => 'The image may not be greater than :max kilobytes.',
            'link.required' => 'The link field is required.',
            'link.url' => 'The link must be a valid URL.',
        ];
    }
}
