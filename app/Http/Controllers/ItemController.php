<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function get()
    {
        $products = Product::get();
        $items = Item::get();
        return view('item', compact('products', 'items'));
    }

    public function create()
    {
        $products = Product::get();
        $orders = Order::get();
        return view('createItem', compact('products', 'orders'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id'
        ]);

        $item = new Item();
        $item->quantity = $request->input('quantity');
        $item->price = $request->input('price');
        $item->order_id = $request->input('order_id');
        $item->product_id = $request->input('product_id');

        $item->save();
        return redirect()->route('getItem');
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('showItem', compact('item'));
    }
}
