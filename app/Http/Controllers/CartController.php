<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Mail;

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

    public function cartCheckout()
    {
//        dd(\request()->all());

        \Stripe\Stripe::setApiKey("sk_test_kQGjyBkIDC8YE6wAotLXE687");
//        $token = $_POST['stripeToken'];
        $token = request()->stripeToken;

        $charge = \Stripe\Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
        ]);


        Cart::destroy();

        Mail::to(\request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

        return redirect('/home');
    }


}
