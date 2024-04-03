<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSkillRequest extends FormRequest
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
            'skill' => ['required', 'string', 'max:255'],
            'skill_type' => ['required', Rule::in(["1", "2"])],
            'skill_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
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
            'skill.required' => 'The skill field is required.',
            'skill.string' => 'The skill must be a string.',
            'skill.max' => 'The skill may not be greater than :max characters.',
            'skill_type.required' => 'The skill type field is required.',
            'skill_image.*.image' => 'The file must be an image.',
            'skill_image.*.mimes' => 'The image must be a file of type: :values.',
            'skill_image.*.max' => 'The image may not be greater than :max kilobytes.',
        ];
    }
}
