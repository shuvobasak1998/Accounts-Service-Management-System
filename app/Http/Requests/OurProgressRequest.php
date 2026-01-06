<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OurProgressRequest extends FormRequest
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
            'progress_top_discription'  => 'required|string',
            'first_image_path'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'second_image_path'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'third_image_path'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'details_title.*'       => 'required|string',
            'detail_discription.*'    => 'required|string',
        ];
    }
}
