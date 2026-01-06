<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogDetailsRequest extends FormRequest
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
            'blog_category_id' => 'required|exists:blog_categories,id',
            'card_title' => 'required|string|max:255',
            'card_discription' => 'required|string',
            'card_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'blog_detail_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'blog_detail_title' => 'required|string|max:255',
            'blog_detail_discription' => 'required|string',
            'created_by' => 'nullable|integer|exists:users,id',
            'updated_by' => 'nullable|integer|exists:users,id',
            'deleted_by' => 'nullable|integer|exists:users,id',
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'blog_category_id.required' => 'Blog category is required.',
            'blog_category_id.exists' => 'Selected blog category does not exist.',
            'card_title.required' => 'Card title is required.',
            'card_discription.required' => 'Card description is required.',
            'card_image_path.image' => 'The card image must be a valid image file.',
            'blog_detail_title.required' => 'Blog detail title is required.',
            'blog_detail_discription.required' => 'Blog detail description is required.',
            'created_by.required' => 'Created by is required.',
            'created_by.exists' => 'Invalid user for created by.',
        ];
    }
}
