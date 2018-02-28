<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetModelRequest extends FormRequest
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
            "name"        => "required|max:255|unique:asset_models,name,{$this->id}",
            "category_id" => "required",
            "details"     => "max:255",
        ];
    }
}
