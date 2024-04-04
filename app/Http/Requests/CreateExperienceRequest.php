<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateExperienceRequest extends FormRequest
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
            'position' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'job_description' => ['required', 'string', 'max:1000'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
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
            'position.required' => 'The position field is required.',
            'position.string' => 'The position must be a string.',
            'position.max' => 'The position may not be greater than :max characters.',
            
            'company.required' => 'The company field is required.',
            'company.string' => 'The company must be a string.',
            'company.max' => 'The company may not be greater than :max characters.',
            
            'address.required' => 'The address field is required.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than :max characters.',
            
            'job_description.required' => 'The job description field is required.',
            'job_description.string' => 'The job description must be a string.',
            'job_description.max' => 'The job description may not be greater than :max characters.',
            
            'start_date.required' => 'The start date field is required.',
            'start_date.date' => 'The start date must be a valid date.',

            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after_or_equal' => 'The end date must be equal to or after the start date.'
        ];
        
    }
}
