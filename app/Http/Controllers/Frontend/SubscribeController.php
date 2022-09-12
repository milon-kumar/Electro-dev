<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        self::validate($request,[
            'subscribe_email'     =>'required|email|unique:subscribes,email',
        ]);

        Subscribe::create([
           'user_id'    =>auth()->id(),
           'email'      =>$request->input('subscribe_email'),
        ]);

        toast('Subscribed','success');
        return redirect()->back();
    }
}
