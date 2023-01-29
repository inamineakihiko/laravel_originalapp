<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Test;

class testController extends Controller
{
    public function showRegisterForm()
    {
        return view('/test');
    }

    public function create(Request $request)
    {
        $test = new Test();

        $test->name = $request->name;
        $test->email = $request->email;
        $test->title = $request->title;
        $test->comment = $request->comment;

       $test->save();
    }

}
