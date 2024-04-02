
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .card {
            width: 100%;
            border-radius: 6px;
            overflow: hidden; /* Ensure that the image doesn't overflow */
        }

        .card-image {
            background-image: url('{{ asset('storage/images/' . $product->image) }}');
            background-size: cover;
            background-position: center;
            height: 360px; /* Set height to 100% to cover the entire card */
            border-radius: 6px 6px 0 0;
        }
    </style>
@extends('layout.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-4"> 

                <div class="card">
                    <div class="card-image"></div>
                    <div class="category text-uppercase text-primary font-weight-bold"> {{$product->name}} </div>
                    <div class="card-body">
                        <h5 class="card-title heading"> {{$product->desc}} </h5>
                        <h5 class="card-title heading"> {{$product->price}} DH </h5>
                        <a href="{{route('getProduct')}}" class="card-link">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
