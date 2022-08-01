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


        // 以下の計算をメソッドにまとめるか
        // 除脂肪体重と一日の摂取カロリーの計算
        $weight = $request->weight;
        $body_fat = $request->body_fat;

        $l_b_mass = round($weight - ($weight * ($body_fat/100)),2);
        $total_kcal = floor($l_b_mass * 40) ;

        $pfc->l_b_mass = $l_b_mass;
        Auth::user()->pfcs()->save($pfc);

        // 各摂取カロリー、質量の計算
        $p_mass = floor($l_b_mass);
        $p_kcal = floor($p_mass * 4);

        $f_kcal = floor($total_kcal * 0.15);
        $f_mass = floor($f_kcal/9);

        $c_kcal = floor($total_kcal - $p_kcal - $f_kcal);
        $c_mass = floor($c_kcal / 4);

        return view('pfc/result',
        [
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
        $l_b_mass = $pfc->l_b_mass;

        $total_kcal = floor($l_b_mass * 40) ;
        // 除脂肪体重と一日の摂取カロリーの計算
        $p_mass = floor($l_b_mass);
        $p_kcal = floor($p_mass * 4);

        $f_kcal = floor($total_kcal * 0.15);
        $f_mass = floor($f_kcal/9);

        $c_kcal = floor($total_kcal - $p_kcal - $f_kcal);
        $c_mass = floor($c_kcal / 4);
        // 各摂取カロリー、質量の計算

        // たんぱく質の参考値
        $p_example = [
            'ro-su' => round($p_mass/0.27, 0),
            'egg' => round($p_mass/6, 0),
            'natto' => round($p_mass/7,0),
            'touhu' => round($p_mass/7.5, 0),
            'milk' => round($p_mass/0.033, 0),
            'sake' => round($p_mass/18, 1),
        ];

        // 脂質の参考値
        $f_example = [
            'oil' => round($f_mass/1, 0),
            'butter' => round($f_mass/0.81, 0),
            'poteto' => round($f_mass/20, 1),
            'baraniku' => round($f_mass/0.28, 0),
            'tonkatsu' => round($f_mass/30,1),
        ];

        // 炭水化物の参考値
        $c_example = [
            'rice' => round($c_mass/57, 1),
            'bread' => round($c_mass/32, 1),
            'udon' => round($c_mass/114,1),
            'poteto' => round($c_mass/51, 1),
            'cola' => round($c_mass/61, 1),
            'honey' => round($c_mass/0.8, 0),
        ];

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
            'p_example' => $p_example,
            'f_example' => $f_example,
            'c_example' => $c_example,
        ]);
    }

    public function delete(PfcResult $pfc){
        $pfc->delete();
        return redirect('/index');
    }
}
