<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class CheckOutController extends Controller
{
    public function index(){
        $data['route'] = 'cart_page';
        $data['carts'] = Cart::where('user_id',Auth::id())->get();
        $data['user'] = User::where('id',Auth::id())->first();
        return view('website.checkout.index',$data);
    }
}
