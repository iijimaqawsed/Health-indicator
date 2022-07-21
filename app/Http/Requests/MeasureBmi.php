<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeasureBmi extends FormRequest
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
            'height' => 'required|integer',
            'weight' => 'required|integer',
        ];
    }

    // regex:^[1-9][0-9]+$|^[1-9][0-9]+\.?[0-9]+$

    public function attributes()
    {
        return [
            'height' => '身長',
            'weight' => '体重',
        ];
    }

    public function messages()
    {
        return [
            'height.max' => ':attribute の数値が大きすぎます。単位は「ｃｍ」です。',
        ];
    }
}
