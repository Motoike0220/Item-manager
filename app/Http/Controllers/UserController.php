<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{

    //ユーザー一覧の表示
    public function users (Request $request) {

        if(isset($request->column)) {

            $column = $request->input('column');
            $keyword =$request->input('keyword');
            $users = User::where($request->column,'LIKE',"%".$keyword."%")
            ->paginate(3);

            return view('users.index',compact('users'));

            } else {

        $users = User::select()->paginate(10);
        return view("users.index",compact('users'));
        }
    }
    //ユーザーの更新
    public function edit(Request $request){
        $user = User::find($request->id);
        //postで更新
        if($request->isMethod('post')){
            //バリデーション
            $this->validate($request, [
                'email' => 'required|email:filter,dns',
                'name' => 'required'
                                    ],
            [   'name.required' => '名前を入力してください',
                'email.required' => 'メールアドレスを入力してください',
                'email.email' => '正しい形式のアドレスを入力してください'
            ]);

            User::find($request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'user_level' => $request->user_level,
            ]);

            return redirect('/users');
        }
        return view('users.edit',compact('user'));
    }

    //ユーザーの削除
    public function deleteUser(Request $request) {
        User::where('id',$request->id)->delete();
        return redirect ('/users');
    }
}
