<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchItems(Request $request){
        if($request->isMethod('post')){

        }

        return view('search.items');
    }

    public function searchUsers(Request $request){
        if($request->isMethod('post')){

        }

        return view('search.users');
    }
}
