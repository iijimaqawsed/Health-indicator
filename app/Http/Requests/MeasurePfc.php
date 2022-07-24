<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeasurePfc extends FormRequest
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
            'weight' => 'required|regex:/^[1-9]\d{1,2}(\.\d{1,2})?$/',
            'body_fat' => 'required|regex:/^[1-9]\d{1}(\.\d{1,2})?$/',
        ];
    }

    public function attributes()
    {
        return [
            'weight' => '体重',
            'body_fat' => '体脂肪率',
        ];
    }

    public function messages()
    {
        return [
            'weight.regex' => ':attribute は整数３桁以内で小数点第二位までの半角数値で入力をお願いします。',
            'body_fat.regex' => ':attribute は整数２桁以内で小数点第二位までの半角数値で入力をお願いします。',
        ];
    }
}
