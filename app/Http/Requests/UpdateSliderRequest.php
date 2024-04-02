<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            'images' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
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
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['string', 'max:255'],
            'description' => ['string', 'max:255'],
            'content' => ['string', 'max:255'],
            'about_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
}
