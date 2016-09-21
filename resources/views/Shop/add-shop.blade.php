@extends('app')

@section('content')
    <div class="products-grid">
        <header>
            <h3 class="head text-center">Approve Shops</h3>
        </header>
        @foreach($shops as $key=>$shop)
        <div class="col-md-4 col-sm-6 col-xs-12 product simpleCart_shelfItem text-center">
            <div id="box">
                <a href="{{action('ShopController@show',$shop->id)}}"><img src="{{asset($shop->images[0]->link)}}" alt="{{$shop->shop_name}}" /></a>
                <a class="product_name" href="{{action('ShopController@show',$shop->id)}}">{{$shop->shop_name}}</a>
                <p><a class="item_add" href="#"><i></i> <span class="item_price">Owner : {{$shop->user->user_name}}</span></a></p>
                <br><br>

                <a href="#!">
                    <i class="glyphicon glyphicon-ok text-success add-remove add" id="{{$shop->id}}"
                       value="{{$shop->premium_shop}}" aria-hidden="true" style="font-size: larger"></i>
                &nbsp;
                    <i class="glyphicon glyphicon-remove text-danger add-remove remove" id="{{$shop->id}}"
                       aria-hidden="true" style="font-size: larger"></i>
                </a>

                @if($shop->premium_shop)
                    <br>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="expiry_date#{{$shop->id}}">Expiry Date</label>
                            <input name="expiry_date#{{$shop->id}}" id="expiry_date#{{$shop->id}}"
                                   class="expiry_date form-control">
                            <small class="help-block" style="color: #A94442; display: none;" id="error_for_date">Date cannot be empty</small>
                        </div>
                    </div>
                @endif
            </div>
        </div>
            @if(($key+1)%3==0)
                <div class="clearfix"></div>
            @endif
        @endforeach
        <div class="clearfix"></div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/addShop.js')}}"></script>
    <script>
        $('.expiry_date').datepicker();
    </script>
@endsection

@section('head')
    <title>Add Shop - Businessway</title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
@endsection