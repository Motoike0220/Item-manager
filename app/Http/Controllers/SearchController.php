<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class SearchController extends Controller
{

    //商品検索画面表示
    public function Items(Request $request){
          
        $keyword =$request->input('keyword');
        $items = Item::where('status',1)
        ->where('$request->$column','LIKE',"%'.$keyword.'%")
        ->paginate(5);

        //return view('search.items');
    }


    //ユーザー検索画面表示
    public function Users(Request $request){
        return view('search.users');
    }
}
