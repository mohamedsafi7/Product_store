<link rel="stylesheet" href="add.css">
@extends('layout.master')

@section('content')
<form action="{{ route('addProd') }}" method="POST"  enctype="multipart/form-data" class="form">
    @csrf
    <p class="title">ajouter produit </p>
        <div class="flex">
        <label>
            <input name="name" required="" placeholder="" type="text" class="input">
            <span>name</span>
        </label>

        <label>
            <input name="desc" required="" placeholder="" type="text" class="input">
            <span>description</span>
        </label>
    </div>  
            
    <label>
        <input name="price" required="" placeholder="" type="number" class="input">
        <span>price</span>
    </label> 
        
    <label>
        <input name="image" required="" placeholder="" type="file" class="input">
    </label>
    <button type="submit" class="submit">Ajouter</button>
</form>
@endsection