<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BmiResult;
use App\Http\Requests\MeasureBmi;

class BmiController extends Controller
{
    public function showMeasureForm() {
        return view('bmi/measure');
    }


    public function measure(MeasureBmi $request) {
        $bmi = new BmiResult();
        // 身長体重の入力
        $bmi->height = $request->height;
        $bmi->weight = $request->weight;

        // 身長を加工した数値、標準体重の計算結果、標準体重との差の取得
        list($format_height, $s_weight, $difference_weight) =
        $this->weightMeasure($bmi->height, $bmi->weight);

        // BMIの計算
        $bmi->result = round($bmi->weight / $format_height,2);


        if($bmi->result < 18.5) {
            $bmi->score = 0;
        } elseif($bmi->result >= 18.5 && $bmi->result < 25) {
            $bmi->score = 1;
        } elseif($bmi->result >= 25 && $bmi->result < 30){
            $bmi->score = 2;
        } elseif($bmi->result >= 30){
            $bmi->score = 3;
        }

        Auth::user()->bmis()->save($bmi);

        return redirect()->route('bmi.result',
            [
                'bmi' => $bmi
            ]
        )->with(
            [
                'weight' => $s_weight,
                'dif_weight' => $difference_weight,
            ]);
    }

    public function result(BmiResult $bmi) {

        // 標準体重の計算結果、標準体重との差の取得
        list($format_height, $s_weight, $difference_weight) =
        $this->weightMeasure($bmi->height, $bmi->weight);

        return view('bmi/result',[
            'bmi' => $bmi,
            'weight' => $s_weight,
            'dif_weight' => $difference_weight,
        ]);
    }

    public function delete(BmiResult $bmi){
        $bmi->delete();
        return redirect('/');
    }

    public function weightMeasure($height, $weight){

        // 身長の数値の加工
        $format_height = pow($height/100,2);

        // 身長に対した標準体重の計算
        $s_weight = round($format_height*22, 2);

        // 標準体重と現在の体重との差
        $difference_weight = $weight - $s_weight;

        return array($format_height, $s_weight, $difference_weight);
    }

}
