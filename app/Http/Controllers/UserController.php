<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function showMyPage() {
        return view('mypage', ['user' => Auth::user()]);
    }

    public function update(Request $request) {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ],[],[
            'name' => 'ユーザー名',
        ]);

        $user = Auth::user();
        $params = $request->all();
        // パラメータをセットして更新
        $user->fill($params)->save();

        return redirect()->route('mypage', ['user' => $user]);
    }
}
