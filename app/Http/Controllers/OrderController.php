<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function get()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Fetch orders associated with the user, along with their products
        $orders = Order::with('items.product')->where('user_id', $user->id)->get();

        // Calculate the total sum of prices of all products
        $totalSum = 0;
        foreach ($orders as $order) {
            foreach ($order->items as $item) {
                $totalSum += $item->product->price * $item->quantity;
            }
        }

        // Fetch products for reference
        $products = Product::get();

        return view('orders', compact('orders', 'products', 'totalSum'));
    }
}
