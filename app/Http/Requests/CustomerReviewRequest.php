<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerReviewRequest extends FormRequest
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
            'customer_reviews_top_discription'  => 'nullable|string|max:255',
            'customer_review'       => 'required|string|max:255',
            'customer_name'    => 'required|string|max:255',
            'customer_designation' => 'required|string',
            'customer_organization' => 'required|string',
            'customer_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
