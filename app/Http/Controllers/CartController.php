<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store($productId)
    {
        $cart = new Cart;

        if (Auth::check()) {
            $cart->user_id = Auth::id();
        } else {
            $cart->session_id = session()->getId();
        }

        $cart->product_id = $productId;

        $cart->save();

        return redirect()->back();
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->back();
    }
}
