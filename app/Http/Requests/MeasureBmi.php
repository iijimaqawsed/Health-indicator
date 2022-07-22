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
            'height' => 'required|regex:/^[1-9]\d{1,2}(\.\d{1,2})?$/',
            'weight' => 'required|regex:/^[1-9]\d{1,2}(\.\d{1,2})?$/',
        ];
    }
    // \d+(\.\d+)?　参考にした正規表現

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
            'height.regex' => ':attribute は整数３桁以内で小数点第二位までの半角数値で入力をお願いします。',
            'weight.regex' => ':attribute は整数３桁以内で小数点第二位までの半角数値で入力をお願いします。',
        ];
    }
}
