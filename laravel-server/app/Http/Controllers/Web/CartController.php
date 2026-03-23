<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $items = [];
        $total = 0;

        foreach ($cart as $id => $qty) {
            $product = Product::find($id);
            if ($product) {
                $items[] = ['product' => $product, 'quantity' => $qty];
                $total += $product->price * $qty;
            }
        }

        return view('pages.cart', compact('items', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'integer|min:1',
        ]);

        $cart = session('cart', []);
        $id = $request->product_id;
        $qty = $request->get('quantity', 1);

        $cart[$id] = ($cart[$id] ?? 0) + $qty;
        session(['cart' => $cart]);

        return back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer|min:0',
        ]);

        $cart = session('cart', []);
        $id = $request->product_id;

        if ($request->quantity <= 0) {
            unset($cart[$id]);
        } else {
            $cart[$id] = $request->quantity;
        }

        session(['cart' => $cart]);

        return back();
    }

    public function remove($id)
    {
        $cart = session('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart]);

        return back()->with('success', 'Item removed from cart.');
    }
}
