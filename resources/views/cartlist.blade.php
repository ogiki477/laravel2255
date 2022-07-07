@extends('master')

@section('content')
<div class="custom-product">
    <div class="trending-wrapper">
        <h4>Details of the products</h4><br><br>
        <a class="btn btn-success" href="ordernow">Order Now</a><br><br>
        @foreach ($products as $item)
        <div class="row searched-item cart-list-divider">
            <div class="col-sm-3">
                <a href="detail/{{ $item->id }}">
                    <img class="trending-image" src="{{ $item->gallery }}">
                </a>
            </div>
            <div class="col-sm-4">
                <div class="">
                <h2>{{ $item->name }}</h2>
                <h5>{{ $item->description }}</h5>
            </div>
        </div>
            <div class="col-sm-3">
                <a href="/removecart/{{ $item->cart_id }}"   class="btn btn-warning">Remove from cart</a>
            </div>
    </div>
        @endforeach
        <a class="btn btn-success" href="ordernow">Order Now</a><br><br>
    </div>
</div>

@endsection   