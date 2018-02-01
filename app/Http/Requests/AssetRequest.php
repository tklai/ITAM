<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetRequest extends FormRequest
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
            "machineName" => "required|max:255|unique:assets,machineName,{$this->id}",
            "asset_model_id" => "required",
            "serialNumber" => "required|max:255|unique:assets,serialNumber,{$this->id}",
            "vendor_id" => "required",
            "orderDate" => "required|before:today",
            "warrantyExpiryDate" => "required",
            "location_id" => "required",
            "remarks" => "max:255",
        ];
    }
}
