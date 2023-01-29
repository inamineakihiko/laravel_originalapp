<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Http\Requests\CreateItem;
use Illuminate\Support\Facades\Auth;
class ItemController extends Controller
{
    public function showRegisterForm()
    {
        return view('item/register');
    }

    public function showEditForm(int $id)
    {
        $products = register::all();
        $currentd_products = register::find($id);
        $edit_products = register::where('id', $currentd_products->id)->first();
        return view('item/edit',compact('edit_products'));
    }

    public function update(CreateItem $request)
    {
        if($request->has('update')){
            $update_product = $request->input('update_product');
            // update_productの値を取得する
            $update_target_product = register::where('id', '=', $update_product)->first();
            $img = $request->file('item_image')->store('public/img/');
            $update_target_product->item_image = basename($img);
            $user = Auth::user();
            $user_id = Auth::id();
            $update_target_product->id = $update_product;
            $update_target_product->user_id = $user_id;
            $update_target_product->title = $request->title;
            $update_target_product->category = $request->category;
            $update_target_product->content = $request->content;
            $update_target_product->prices = $request->prices;
            $update_target_product->postage = $request->postage;
            $update_target_product->status = $request->status;
            $update_target_product->shippingmethod = $request->shippingmethod;
            $update_target_product->sender = $request->sender;
            $update_target_product->deliverytime = $request->deliverytime;
            $update_target_product->save();

            return redirect()->route('productlist.index');
        }
    }

    public function create(CreateItem $request)
    {
        $register = new Register();
        // name属性が'item_image'のinputタグをファイル形式に、画像をpublic/imgに保存
        $img = $request->file('item_image')->store('public/img/');
        // 上記処理にて保存した画像に名前を付け、itemsテーブルのitem_imageカラムに、格納
        $register->item_image = basename($img);

        $user = Auth::user();
        $user_id = Auth::id();
        $register->user_id = $user_id;
        $register->title = $request->title;
        $register->category = $request->category;
        $register->content = $request->content;
        $register->prices = $request->prices;
        $register->postage = $request->postage;
        $register->status = $request->status;
        $register->shippingmethod = $request->shippingmethod;
        $register->sender = $request->sender;
        $register->deliverytime = $request->deliverytime;

        $register->save();

        return redirect()->route('productlist.index');
    }

}
