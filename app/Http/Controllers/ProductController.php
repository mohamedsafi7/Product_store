<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get(){
        $products= Product::get();
        $items= Item::get();
        return view('product',compact('products','items'));
    }
    public function create(){
        $items= Item::get();
        return view('createProd',compact('items'));
    }
    public function add(Request $request){
        $request->validate([
            'name'=>'required',
            'desc'=>'required',
            'price'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);
        $product=new Product();
        $product->name=$request->input('name');
        $product->desc=$request->input('desc');
        $product->price=$request->input('price');
        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $name=time();
            $image -> getClientOriginalExtension();
            $image-> storeAs('public/images/'.$name);
            $product->image = $name;
        }
        $product->save();
        return redirect()->route('getProduct');
    }
    public function show($id){
        $product= Product::FindorFail($id);
        $items= Item::get();
        return view('show', compact('product','items'));
    }
    public function addtocart($id, Request $request)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Retrieve the authenticated user
            $user = auth()->user();
        
            // Create a new order for the user
            $order = new Order();
            $order->user_id = $user->id; // Associate the user with the order
            $order->save();
        
            // Retrieve the product to be added to the order cart
            $product = Product::findOrFail($id);
        
            // Add the product to the order cart with the selected quantity
            $item = new Item();
            $item->quantity = $request->input('quantity', 1); // Default to 1 if quantity is not provided
            $item->price = $product->price;
            $item->order_id = $order->id;
            $item->product_id = $product->id;
            $item->save();
        
            // Redirect to the product view or any other page as needed
            return redirect()->route('getProduct');
        } else {
            // User is not authenticated, handle accordingly (e.g., redirect to login)
            return redirect()->route('login');
        }
    }
    

    
    
    
}
