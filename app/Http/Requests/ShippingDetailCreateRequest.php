<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingDetailCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'address_1' => 'required',
            //UK postcode format- 2 letters followed by 2 numbers, followed by optional letters or numnbers
            'postcode' => 'required|string|min:5|max:8|regex:/^[A-Z]{1,2}[0-9]{1,2}[A-Z]{0,1}[0-9]{0,1}$/',
        ];
    }
}
