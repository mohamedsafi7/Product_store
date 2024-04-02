<?php

namespace App\Http\Controllers;

use App\Models\Item;
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
        return view('show', compact('product'));
    }
}
