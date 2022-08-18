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

    public function update(User $user, Request $request) {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ],[],[
            'name' => 'ユーザー名',
        ]);

        $user = Auth::user();
        $params = $request->all();
        // パラメータをセットして更新
        $user->fill($params)->save();

        return redirect()->route('mypage', ['user' => $user])->with('message', '変更が完了しました。');
    }
}
