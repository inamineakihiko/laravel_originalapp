<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Contact;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class productlistController extends Controller
{
    public function index()
    {
        $products = product::all();
        $user_id = Auth::user()->id;
        $favorites =  favorite::all();
        return view('productlist/index', [
            'products' => $products,
            'favorites' => $favorites
        ]);
    }

    public function admin()
    {
        $users = User::all();
        return view('/admin', [
            'users' => $users,
        ]);
        $sex = $request->input('sex'); // sexの値を取得する

        $update_target_user = User::where('sex', $sex)->first();
    }

    public function adminupdate(Request $request)
    {
        if($request->has('update')){
            $select_user = $request->input('select_user');
            // select_userの値を取得する
            $update_target_user = User::where('id', '=',$select_user)->first();
            $update_target_user->name = $request->name[$select_user];
            $update_target_user->email = $request->email[$select_user];
            $update_target_user->save();
            return back();
        }elseif($request->has('delete')){
            $select_user = $request->input('select_user');
            // select_userの値を取得する
            $delete_target_user = User::where('id', '=',$select_user)->first();
            $delete_target_user->delete();
            return back();
        }
    }


    public function disp(int $id)
    {
        $products = product::all();
        $currentd_products = product::find($id);
        $disp_products = product::where('id', $currentd_products->id)->get();

        return view('productlist/disp', [
            'disp_products' =>  $disp_products,
        ]);
    }

    public function like(Request $request)
    {
        $like = New Favorite();
        $products = product::all();
        $users = Auth::user();
        $like->items_id = $request->items_id;
        $like->user_id = $request->user_id;
        $like->save();

        $users_id = Auth::user()->id;
        $favorite_products = product::join('favorites', 'items.id', '=', 'favorites.items_id')->where('favorites.user_id', '=', $users_id)
        ->get();
        return view('mypage/favorite',[
            'favorite_products' => $favorite_products
        ]);
    }

    public function destroy(Request $request) {
        $unlike = favorite::where('items_id','=',$request->items_id)->where('user_id','=',$request->user_id)->first();
        $unlike->delete();

        $users_id = Auth::user()->id;
        $favorite_products = product::join('favorites', 'items.id', '=', 'favorites.items_id')->where('favorites.user_id', '=', $users_id)
        ->get();

        return view('mypage/favorite',[
            'favorite_products' => $favorite_products
        ]);
    }

    public function showSearchform(){
        $products = product::all();
        return view('productlist.search',[
            'products' => $products,
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = product::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")->orWhere('category', 'LIKE', "%{$keyword}%");
        }
        $products = $query->get();
        return view('productlist.search', compact('products', 'keyword'));
    }

    public function showContactform(int $id){
        $contacts = contact::all();
        $products = product::all();
        $users = user::all();
        $user_id = Auth::user()->id;
        $currentd_products = product::find($id);
        $all_comments = contact::where('contacts.items_id', '=', $currentd_products->id)->where('contacts.user_id', '!=', $currentd_products->user_id)->get();
        $register_comments = contact::where('contacts.items_id','=', $currentd_products->id)->where('contacts.user_id', '=', $currentd_products->user_id)->get();
        return view('productlist.contact', compact(
            'currentd_products','all_comments','register_comments'
        ));
    }

    public function contact(Request $request){
        $contacts = new contact;
        $contacts->content = $request->content;
        $contacts->items_id = $request->items_id;
        $contacts->user_id = $request->user_id;
        $contacts->name = $request->name;
        $contacts->image = $request->image;
        $contacts->save();
        return back();
    }

    public function order(Request $request)
    {
        $order = New order();
        $products = product::all();
        $order->items_id = $request->items_id;
        $order->user_id = $request->user_id;
        $order->save();
        $users_id = Auth::user()->id;
        $order_products = product::join('orders_details', 'items.id', '=', 'orders_details.items_id')->where('orders_details.user_id', '=', $users_id)->get();
        return view('mypage.purchase',[
          'order_products' => $order_products
        ]);
    }
}


