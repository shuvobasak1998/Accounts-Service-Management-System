<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:service_categories,name,' . $this->route('blog_category'),
            'slug' => 'nullable|string|max:255|unique:service_categories,slug,' . $this->route('blog_category'),
            'tag_id' => 'required|exists:tags,id'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The blog category title is required.',
            'name.unique' => 'This blog category title is already taken.',
            'slug.unique' => 'This slug is already in use.',
            'tag_id.required' => 'The tag is required.',
        ];
    }
}
