<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    //
//    public static $total=0;

    public function addToCart()
    {
//         dd(request()->all());
        $product = Product::findOrFail(request()->product_id);
        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'qty' => request()->product_quantity,
            'price' => $product->product_price,

        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

//         dd($cart);
//        dd(Cart::content());
        return redirect('/cart');
//        return redirect()->back();
    }

    public function cart()
    {
//        Cart::destroy();
//        dd(Cart::content());
//        foreach (Cart::content() as $product) {
//            CartController::$total += $product->subtotal;
//        }
//        return view('cart', compact(['total']));
        return view('cart');
    }

    public function cartDelete($id)
    {

        Cart::remove($id);
        return redirect('/cart');
    }

    public function cartMinus($id, $qty)
    {
        Cart::update($id, $qty - 1);
        return redirect()->back();
    }

    public function cartPlus($id, $qty)
    {
        Cart::update($id, $qty + 1);
        return redirect()->back();
    }

}
