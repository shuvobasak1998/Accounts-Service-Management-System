<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsInformationRequest extends FormRequest
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
            'contact_us_top_title'  => 'required|string',
            'contact_us_top_discription'  => 'required|string',
            'contact_us_image_path'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title.*'       => 'required|string',
            'discription.*'    => 'required|string',
        ];
    }
}
