<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
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
            'about_us_top_discription'  => 'required|string|max:255',
            'about_us_first_image_path'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_us_second_image_path'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_us_feature_title'       => 'required|string|max:255',
            'about_us_feature_description'    => 'required|string',
            'why_choose_us_description'    => 'required|string',
            'topic_title'                => 'required|array',
            'percentage_value'                => 'required|array',
            'about_us_feature'        => 'required|array',
            'about_us_feature.*'      => 'required|string|max:255',
            'about_us_card_title'          => 'required|array',
            'about_us_card_title.*'        => 'required|string|max:255',
            'about_us_card_discription'     => 'required|array',
            'about_us_card_discription.*'   => 'required|string|max:65535',
        ];
    }
}
