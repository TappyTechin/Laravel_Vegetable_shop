<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Cartid;


class CartController extends Controller
{
    public function add_to_cart(Request $request, $id) {
        $formField = $request->validate([
            'p_mass' => 'required|numeric|min:1',
        ]);
        $cart = new Cart();
        $cart->p_id = $id;
        $cart->p_mass = $formField['p_mass'];
        $cart->u_id = Auth::user()->id;
        $cart->cart_id = 0;
        $cart->c_status = 'pending';
        $cart->save();

        return redirect('/home')->with('success', 'Product added to cart successfully');
    }

    public function cart_list() {
        $carts = Cart::join('products', 'carts.p_id', '=', 'products.id')
            ->where('carts.u_id', Auth::id())
            ->where('carts.c_status', 'pending')
            ->select('carts.*', 'products.p_name', 'products.p_price')
            ->get();

        return view('cart_list', compact('carts'));
    }

    public function checkout() {
        $lastCart = Cart::selectRaw("MAX(cart_id) as cart_id")->first();
        $newCartId = $lastCart && $lastCart->cart_id ? $lastCart->cart_id + 1 : 1;
        $cartUpdate = Cart::where('u_id', Auth::id())
            ->where('cart_id', 0)
            ->where('c_status', 'pending')
            ->update([
                'cart_id' => $newCartId,
                'c_status' => 'checkout'
            ]);
        if ($cartUpdate) {
            cartid::create(['c_id' => $newCartId]);
            return redirect('/home')->with('success', 'Checkout successful');
        }
        return back()->with('error', 'Checkout failed');
    }

    public function viewcheckout(){
        $carts = Cart::join('products', 'carts.p_id', '=', 'products.id')
        ->where('carts.u_id', Auth::id())
        ->where('carts.c_status', 'checkout')
        ->select('carts.*', 'products.p_name', 'products.p_price')
        ->get();

    return view('viewcheckout', compact('carts'));
    }
}
