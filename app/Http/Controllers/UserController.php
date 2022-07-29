<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function showMyPage(User $user) {
        return view('mypage', ['user' => Auth::user()]);
    }

}
