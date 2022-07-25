<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PfcResult;
use App\Http\Requests\MeasurePfc;

class PfcController extends Controller
{
    public function showMeasureForm() {
        return view('pfc/measure');
    }

    public function measure(MeasurePfc $request) {
        $pfc = new PfcResult();

        $pfc->weight = $request->weight;
        $pfc->body_fat = $request->body_fat;

        Auth::user()->pfcs()->save($pfc);


        // 以下の計算をメソッドにまとめるか
        $weight = $request->weight;
        $body_fat = $request->body_fat;

        $l_b_mass = round($weight - ($weight * ($body_fat/100)),2);
        $total_kcal = floor($l_b_mass * 40) ;
        // 除脂肪体重と一日の摂取カロリーの計算
        $p_mass = floor($l_b_mass);
        $p_kcal = floor($p_mass * 4);

        $f_kcal = floor($total_kcal * 0.15);
        $f_mass = floor($f_kcal/9);

        $c_kcal = floor($total_kcal - $p_kcal - $f_kcal);
        $c_mass = floor($c_kcal / 4);
        // 各摂取カロリー、質量の計算

        return view('pfc/result', [
            // ＊＊＊＊＊＊画面遷移先ファイルの作成＊＊＊＊＊
            'pfc' => $pfc,
            'l_b_mass' => $l_b_mass,
            'total_kcal' => $total_kcal,
            'p_mass' => $p_mass,
            'p_kcal' => $p_kcal,
            'f_mass' => $f_mass,
            'f_kcal' => $f_kcal,
            'c_mass' => $c_mass,
            'c_kcal' => $c_kcal,
        ]);
    }

    public function result(PfcResult $pfc) {
        // 以下の計算をメソッドにまとめるか
        $weight = $pfc->weight;
        $body_fat = $pfc->body_fat;

        $l_b_mass = round($weight - ($weight * ($body_fat/100)),2);
        $total_kcal = floor($l_b_mass * 40) ;
        // 除脂肪体重と一日の摂取カロリーの計算
        $p_mass = floor($l_b_mass);
        $p_kcal = floor($p_mass * 4);

        $f_kcal = floor($total_kcal * 0.15);
        $f_mass = floor($f_kcal/9);

        $c_kcal = floor($total_kcal - $p_kcal - $f_kcal);
        $c_mass = floor($c_kcal / 4);
        // 各摂取カロリー、質量の計算
        return view('pfc/result',[
            'pfc' => $pfc,
            'l_b_mass' => $l_b_mass,
            'total_kcal' => $total_kcal,
            'p_mass' => $p_mass,
            'p_kcal' => $p_kcal,
            'f_mass' => $f_mass,
            'f_kcal' => $f_kcal,
            'c_mass' => $c_mass,
            'c_kcal' => $c_kcal,

        ]);
    }
}
