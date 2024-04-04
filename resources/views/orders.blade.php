
@extends('layout.master')

@section('content')
    <table class="w-full whitespace-no-wrap">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                @foreach($order->items as $item) 
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $item->product->name }}</td> 
                        <td>{{ $item->product->price }}</td> 
                        <td>{{ $item->quantity }}</td> 
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total:</th>
                <td>{{ $totalSum }}</td>
            </tr>
        </tfoot>
    </table>
@endsection

