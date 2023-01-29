<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Order;
use App\Http\Requests\CreateMypage;
use Illuminate\Support\Facades\Auth;

class mypageController extends Controller
{
    public function showMypageForm()
    {
        $users = Auth::user();
        return view('mypage/index',compact('users'));
    }

    public function update(CreateMypage $request)
    {
        $users = Auth::user();
        // name属性が'item_image'のinputタグをファイル形式に、画像をpublic/icon_imageに保存
        $img = $request->file('image')->store('public/icon_image/');
        // 上記処理にて保存した画像に名前を付け、itemsテーブルのitem_imageカラムに、格納
        $users->image = basename($img);

        $users->name = $request->name;
        $users->email = $request->email;
        $users->save();
        return back();
    }

    public function showFavoriteForm()
    {
        $users_id = Auth::user()->id;
        $favorite_products = product::join('favorites', 'items.id', '=', 'favorites.items_id')->where('favorites.user_id', '=', $users_id)
        ->get();
        return view('mypage/favorite',[
            'favorite_products' => $favorite_products
        ]);
    }

    public function showRegisterhistoryForm()
    {
        $users_id = Auth::user()->id;
        $register_products = product::where('items.user_id', '=', $users_id)->get();
        return view('mypage/register',[
            'register_products' => $register_products
        ]);
    }

    public function showPurchasehistoryForm()
    {
        $users_id = Auth::user()->id;
        $order_products = product::join('orders_details', 'items.id', '=', 'orders_details.items_id')->where('orders_details.user_id', '=', $users_id)->get();
        return view('mypage.purchase',[
          'order_products' => $order_products
        ]);
    }
}

