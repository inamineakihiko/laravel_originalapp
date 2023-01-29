<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class favoritesController extends Controller
{
    public function like(Items $items, Request $request)
    {
        $like = New Favorite();
        $like->items_id = $items->id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return back();
    }

    public function unlike(Items $items, Request $request)
    {
        $user = Auth::user()->id;
        $like = Favorite::where('items_id',$items->id)->where('user_id',$user)->first();
        $like -> delete();
        return back();
    }

}
