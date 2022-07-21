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
            'weight' => 'required|integer',
            'body_fat' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'weight' => '体重',
            'body_fat' => '体脂肪率',
        ];
    }
}
