<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeItemRequest extends FormRequest
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
            'name_cloth' => 'required|max:255',
            'type' => 'required',
            'size' => 'required',
            'price' => 'required|integer',
            'main_photo' => 'image|mimes:jpeg,jpg,bmp,png,jfif',
            'collection' => 'string|max:255',
            'additional_photos' => 'max:2'
        ];
        if($this->input('additional_photos') != null) {
            $additional_photos = count($this->input('additional_photos'));
            foreach(range( 0, $additional_photos) as $index) {
                $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png,jfif';
            }
        }
        return $rules;

    }

    public function messages()
    {
        return [
            'additional_photos.max' => 'Maximum 2 photo.'
        ];
    }
}
