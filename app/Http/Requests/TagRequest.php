<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:service_categories,name,' . $this->route('tag'),
            'slug' => 'nullable|string|max:255|unique:service_categories,slug,' . $this->route('tag'),
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The tag Title is required.',
            'name.unique' => 'This tag Title is already taken.',
            'slug.unique' => 'This slug is already in use.',
        ];
    }
}
