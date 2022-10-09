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
            ->paginate(1);
    
            return view('users.index',compact('users'));
    
            }else{
        
        $users = User::select()->paginate(10);
        return view("users.index",compact('users'));
        }
    }
    //ユーザーの更新
    public function edit(Request $request){
        $user = User::find($request->id);
        if($request->isMethod('post')){
            User::find($request->id)->update([
                'name' => $request->name,
            ]);

            return redirect('/users');
        }
        return view('users.edit',compact('user'));
    }

    //
}
