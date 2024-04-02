@extends('layout.master')

@section('content')
    <style>
        /* Styles for cards */
        .card {
            width: 23%; /* Set width to fit 4 cards in one row */
            margin: 10px; /* Add margin for spacing between cards */
            border: 1px solid #ccc; /* Add border */
            box-sizing: border-box; /* Include border in card dimensions */
            display: inline-block; /* Display cards in one row */
            vertical-align: top; /* Align cards to the top */
        }
        .card img{
            width: 100%;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="prod d-flex bg-warning align-items-center justify-content-between px-3 py-2" style="background-color: rgb(219, 222, 0);">
                    <h2 class="m-0">List of Products</h2>
                </div>
            </div>
        </div>
        <a href="{{ route('createProd') }}"><h2>Ajouter Produit</h2></a>
        
        <div class="row">
            <div class="col">
                @foreach ($products as $product)
                    <div class="card">
                        <a href="{{route('show',['id'=>$product->id])}}">
                            <img src="storage/images/{{$product->image}}" class="card-img-top" alt="{{ $product->name }} Image">
                        </a>
                        <div class="card-body">
                            <p class="card-text">{{ $product->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
