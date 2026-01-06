<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessInformationRequest extends FormRequest
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
        $businessInfoId = $this->route('businessinfo');
        return [
            'title' => 'required|max:255',
            'short_code' => 'nullable|string|max:255',
            'welcome_msg_title' => 'required|string|max:255',
            'welcome_msg_subtitle' => 'required|string|max:255',
            'welcome_msg_discription' => 'required|string|max:65535',
            'business_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string|max:65535',
            'mobile' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|unique:business_infos,email,' . $businessInfoId . '|max:255',
            'web_address' => 'nullable|string|url|unique:business_infos,web_address,' . $businessInfoId . '|max:255',
            'facebook_address' => 'nullable|string|url|unique:business_infos,facebook_address,' . $businessInfoId . '|max:255',
            'twitter_address' => 'nullable|string|url|unique:business_infos,twitter_address,' . $businessInfoId . '|max:255',
            'linkedin_address' => 'nullable|string|url|unique:business_infos,twitter_address,' . $businessInfoId . '|max:255',
        ];
    }
}

