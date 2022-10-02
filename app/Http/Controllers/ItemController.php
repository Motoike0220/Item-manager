<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $type = Item::TYPE;
        $items = Item
            ::where('items.status', '1')
            ->select()
            ->get();

        return view('item.index', compact('items','type'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }
        $type = Item::TYPE;
        return view('item.add',compact('type'));
    }

    //商品の更新
    public function update(Request $request){
         // POSTリクエストのとき
         $item = Item::find($request->id);
         $type = Item::TYPE;
         
         if ($request->isMethod('post')) {
            
            Item::find($request->id)->update([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }
        
     

        return view('item.update',compact('item','type'));
    }
}
