<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamInformationRequest extends FormRequest
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
        $teamId = $this->route('our_team');
        return [
            'team_information_top_discription' => 'required|max:255',
            'team_member_name' => 'required|string|max:255',
            'team_member_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'team_member_designation' => 'required|string|max:65535',
            'google_address' => 'nullable|string|url|unique:team_informations,google_address,' . $teamId . '|max:255',
            'facebook_address' => 'nullable|string|url|unique:team_informations,facebook_address,' . $teamId . '|max:255',
            'twitter_address' => 'nullable|string|url|unique:team_informations,twitter_address,' . $teamId . '|max:255',
            'linkedin_address' => 'nullable|string|url|unique:team_informations,linkedin_address,' . $teamId . '|max:255',
            'pinterest_address' => 'nullable|string|url|unique:team_informations,pinterest_address,' . $teamId . '|max:255',
        ];
    }
}
