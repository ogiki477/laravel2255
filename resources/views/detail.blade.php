@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="sm-col-6">
        <img class="detail-img" src="{{ $product['gallery'] }}" >
    <div class="sm-col-6">
          <a class="text-danger " href="/"><h1 class="omo">click here to go back</h1></a>
          <h2>{{ $product['name'] }}</h2>
          <h3>Price:{{ $product['price'] }}</h3>
          <h3>Details:{{ $product['description'] }}</h3>
          <h3>category:{{ $product['category'] }}</h3>
          <br>
          <form action="/add_to_cart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
          <button class="btn btn-primary">Add to cart</button>
          
          <button class="btn btn-success">Buy Now</button>
          </form>
    </div>
    
</div>
</div>
</div>
@endsection