<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'required|alpha',
            'surname' => 'required|alpha',
            'phone' => 'required|numeric',
            'email' => 'nullable|email',
            'street' => 'required_without:address_id',
            'house' => 'required_without:address_id',
            'floor' => 'nullable|numeric',
            'apartment' => 'nullable|numeric',
            'comment' => 'nullable',
            'address_id' => 'required_without:street,house|exists:addresses,id'
        ];
    }
}
