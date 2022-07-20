<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BmiResult;

class BmiController extends Controller
{
    public function showMeasureForm() {
        return view('bmi/measure');
    }


    public function measure($request) {
        $bmi = new BmiResult();
        $bmi->height = $request->height;
        $bmi->weight = $request->weight;
        // 身長体重の入力

        $height = $request->height;
        $weight = $request->weight;

        $format_weight = floor($weight);
        $height = pow(floor($height)/100,2);
        $bmi->result = round($format_weight / $height,2);
        // BMIの計算


        if($bmi->result < 18.5) {
            $bmi->score = 0;
        } elseif($bmi->result >= 18.5 && $bmi->result < 25) {
            $bmi->score = 1;
        } elseif($bmi->result >= 25 && $bmi->result < 30){
            $bmi->score = 2;
        } elseif($bmi->result >= 30){
            $bmi->score = 3;
        }

        $s_weight = round($height*22, 2);
        // 身長に対しての標準体重

        $difference_weight = $format_weight - $s_weight;
        // 標準体重との実測体重との差

        Auth::user()->bmis()->save($bmi);

        return redirect()->route('results.index', [
            // ＊＊＊＊＊＊画面遷移先ファイルの作成＊＊＊＊＊
            'bmi' => $bmi->result,
            'score' => $bmi->score,
            // ＊＊＊＊＊アクセサの作成＊＊＊＊＊
            'weight' => $s_weight,
            'dif_weight' => $difference_weight,
        ]);

    }

}
