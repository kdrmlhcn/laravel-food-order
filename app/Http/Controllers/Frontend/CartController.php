<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function cart()
    {
        return view('frontend.cart');
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout()
    {
        $cart = session()->get('cart');

        $jCart = json_encode($cart);

        //dump($jCart);

        $paymentTypes = collect(Order::paymentTypes())
            ->mapWithKeys(function ($value, $key) {
                return [
                    $key => $value['name'],
                ];
            })->toArray();

        return view('frontend.checkout', compact('paymentTypes'));
    }

    public function checkoutStore(Request $request)
    {
        $cart = session()->get('cart');
        $jCart = json_encode($cart);

        $order                  = new Order();
        $order->first_name      = $request->first_name;
        $order->last_name       = $request->last_name;
        $order->email           = $request->email;
        $order->phone           = $request->phone;
        $order->address         = $request->address;
        $order->order_items     = $jCart;
        $order->comment         = $request->comment ?? NULL;
        $order->payment_type    = $request->payment_type;
        $order->order_total     = $request->order_total ?? '0';
        $order->status_id       = $request->status_id ?? 0;
        $order->save();

        $request->session()->forget('cart');

        return redirect()->route('frontend.home')->with('status','Siparişiniz bize ulaştı.');
    }
}
