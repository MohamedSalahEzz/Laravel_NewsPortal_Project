<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Post extends FormRequest
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
            'category_id' => 'required',
            'district_id' => 'required',
            'title_en' => 'sometimes|required',
            'title_ar' => 'sometimes|required',
            'category_id' => 'required',
            'subcategory_id' => 'sometimes|required',
            'district_id' => 'required',
            'subdistrict_id' => 'sometimes|required',
            'image' => 'sometimes|file|image|max:5000',
            'tags_en' => 'sometimes|required',
            'tags_ar' => 'sometimes|required',
            'details_en' => 'sometimes|required',
            'details_ar' => 'sometimes|required',
            'headline' => 'sometimes|required',
            'bigthumbnail' => 'sometimes|required',
            'first_section' => 'sometimes|required',
            'first_section_thumbnail' => 'sometimes|required',
        ];
    }
}
