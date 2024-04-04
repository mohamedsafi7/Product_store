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
                    <h2 class="m-0">List of items</h2>
                </div>
            </div>
        </div>
        <a href="{{ route('createItem') }}"><h2>Ajouter item</h2></a>
        
        <div class="row">
            <div class="col">
                @foreach ($items as $item)
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">{{ $item->quantity }}</p>
                            <p class="card-text">{{ $item->price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
