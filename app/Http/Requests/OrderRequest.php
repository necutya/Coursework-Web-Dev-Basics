<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        $rules = [
            'name_order' => 'required|max:255',
            'email_order' => 'required|max:255|email',
            'phone_order' => 'required|max:255',
            'delivery_order' => 'required',
            'country_order' => 'required',
            'department_order' => 'required|string|max:255',
            'city_order' => 'required|string|max:255',
            'payment_type_order' => 'required',
            'comment_order' => 'max:255',
        ];
        return $rules;

    }
}
