<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BmiResult;
use App\PfcResult;

use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function index() {
        $bmis = Auth::user()->bmis()->orderby('id','desc')->get();
        $pfcs = Auth::user()->pfcs()->orderby('id','desc')->get();

        // dd(Auth::user());

        // $bmis = Auth::user()->bmis()->limit(10)->get();
        // $pfcs = Auth::user()->pfcs()->limit(10)->get();
        // dd($bmis);exit;

        return view('results/index', [
            'bmis' => $bmis,
            'pfcs' => $pfcs,
        ]);
    }
}
