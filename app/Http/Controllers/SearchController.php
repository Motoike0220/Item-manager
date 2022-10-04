<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        if($request->isMethod('post')){

        }

        return view('search.index');
    }
}
