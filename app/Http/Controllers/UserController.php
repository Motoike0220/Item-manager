<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{

    //ユーザー一覧の表示
    public function showUsers () {
        $users = User::all();
        return view("users.index",compact('users'));
    }

    //ユーザーの更新
    public function edit(Request $request){
        if($request->isMethod('post')){
            User::find($request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'user_level' => $request->user_level
            ]);

            return redirect('/users');
        }
        return view('users.edit');
    }

    //
}
