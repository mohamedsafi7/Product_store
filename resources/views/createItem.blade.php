<link rel="stylesheet" href="add.css">
@extends('layout.master')

@section('content')
<form action="{{ route('addItem') }}" method="POST"  class="form">
    @csrf
    <p class="title">ajouter item </p>
        <div class="flex">
        <label>
            <input name="quantity" required="" placeholder="" type="text" class="input">
            <span>quantity</span>
        </label>

        <label>
            <input name="price" required="" placeholder="" type="text" class="input">
            <span>price</span>
        </label>
    </div>  
    <select name="order_id" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150">
        <option value="">Select order</option>
        @foreach($orders as $order)
            <option value="{{ $order->id }}">{{ $order->order_id }}</option>
        @endforeach
    </select>
    <select name="product_id" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150">
        <option  value="">Select product</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>
    
    <button type="submit" class="submit">Ajouter</button>
</form>
@endsection