<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubDistrict extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subdistrict_en' => 'bail|required|max:255',
            'subdistrict_ar' => 'bail|required|max:255',
            'district_id' => 'bail|required|max:255',
        ];
    }
}
