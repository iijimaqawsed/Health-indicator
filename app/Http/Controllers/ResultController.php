<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bmi;
use App\Pfc;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    //
    public function index(Bmi $bmi,Pfc $pfc) {
        $bmis = Auth::user()->bmis()->get();
        $pfcs = Auth::user()->pfcs()->get();

        return view('results/index', [
            'bmis' => $bmis,
            'pfcs' => $pfcs,
        ]);
    }
}
