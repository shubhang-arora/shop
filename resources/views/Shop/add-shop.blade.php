@extends('app')

@section('content')
    <div class="products-grid">
        <header>
            <h3 class="head text-center">Latest Products</h3>
        </header>
        @foreach($shops as $key=>$shop)
        <div class="col-md-4 product simpleCart_shelfItem text-center">
            <a href="{{action('ShopController@show',$shop->id)}}"><img src="{{asset('images/shop-image.png')}}" alt="{{$shop->shop_name}}" /></a>
            <div class="mask">
                <a href="{{action('ShopController@show',$shop->id)}}">Quick View</a>
            </div>
            <a class="product_name" href="{{action('ShopController@show',$shop->id)}}">{{$shop->shop_name}}</a>
            <p><a class="item_add" href="#"><i></i> <span class="item_price">Owner : {{$shop->user_name}}</span></a></p>
            <br><br>
            <span class="glyphicon glyphicon-ok" id="add" aria-hidden="true" style="font-size: larger"></span>
            &nbsp;
            <span class="glyphicon glyphicon-remove" id="remove" aria-hidden="true" style="font-size: larger"></span>
        </div>
            @if(($key+1)%3==0)
                <div class="clearfix"></div>
            @endif
        @endforeach
        <div class="clearfix"></div>
    </div>

@endsection
@section('head')
    <title>Add Shop - Shop</title>
@endsection