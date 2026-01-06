<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicesInformationRequest extends FormRequest
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
            'services_top_discription'  => 'nullable|string|max:255',
            'services_card_title'       => 'required|string|max:255',
            'services_card_subtitle'    => 'nullable|string|max:255',
            'services_card_discription' => 'required|string',
            'services_card_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'service_overview' => 'required|string',
            'service_category_id'        => 'required|exists:service_categories,id',
            'service_attachment_path'    => 'nullable|file|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,svg|max:5120',
            'performance_discription'    => 'required|string',
            'performance'                => 'nullable|array',
            // 'service_benefit'        => 'required|array',
            // 'service_benefit.*'      => 'required|string|max:255',
            'details_title'          => 'required|array',
            'details_title.*'        => 'required|string|max:255',
            'detail_discription'     => 'required|array',
            'detail_discription.*'   => 'required|string|max:65535',

        ];
    }
}
