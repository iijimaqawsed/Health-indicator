<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BmiResult;
use App\PfcResult;
use App\User;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    //
    public function index() {
        $bmis = Auth::user()->bmis()->get();
        $pfcs = Auth::user()->pfcs()->get();
        // dd($bmis);exit;

        return view('results/index', [
            'bmis' => $bmis,
            'pfcs' => $pfcs,
        ]);
    }
}
