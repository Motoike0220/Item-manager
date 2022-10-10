<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use Illuminate\Pagination\Paginator;
use Illuminate\support\Facades\validator;

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
    public function index(Request $request)
    {
       
        //検索機能
        if(isset($request->column)) {

        $type = Item::TYPE;
        $column = $request->input('column');
        $keyword =$request->input('keyword');
        
        $items = Item::where('status',1)
        ->where($request->column,'LIKE',"%".$keyword."%")
        ->paginate(3);
        
        return view('item.index',compact('items','type'));
        
       } else if (isset($request->types)) {
        
           $type = Item::TYPE;
           $items = Item::where('status',1)
           ->where('type',$request->types)
           ->select()->paginate(2);

        return view('item.index',compact('items','type'));

         } else {

        // 商品一覧取得
        $type = Item::TYPE;
        $items = Item::where('items.status', '1')
            ->select()
            ->paginate(10);

        return view('item.index',compact('items','type'));
        }
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
                'type' => 'required',
                'detail' => 'required',
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
                'user_name' => Auth::user()->name, 
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.update',compact('item','type'));
    }
    
    //削除された商品一覧
    public function deletedItems(Request $request){
        $items=Item::where('status',0)->get();
        $type = Item::TYPE;
        return view('item.deletedItems',compact('items','type'));
    }

    //商品の一時削除
    public function delete(Request $request){
        //postの時一時削除
        if($request->isMethod('post')){
            Item::where('id',$request->id)->where('status','1')->update(['status' => '0']);
            return redirect('/items');
        } 
        //getで完全削除
        Item::where('id',$request->id)->where('status','0')->delete();
        return redirect('/items');
    }
        


}

