@extends('app')

@section('content')
    <div class="container">
        <div class="products-page">
            <div class="products">
                <div class="product-listy">
                    <h2>Our Offers</h2>
                    <ul class="product-list">
                        @foreach($shop->offers as $key=>$offer)
                            <li><a href="">{{$offer->title}}</a></li>
                        @endforeach
                        @unless(isset($key))
                                <li><a href="">No Offers Right Now</a></li>
                        @endunless
                    </ul>
                </div>

            </div>
            <div class="new-product">
                <div class="col-md-5 zoom-grid">
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach($shop->images as $key=>$image)
                                <li data-thumb="{{asset($image->link)}}">
                                    <div class="thumb-image"> <img src="{{asset($image->link)}}" data-imagezoom="true" class="img-responsive" alt="" /> </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
                <div class="col-md-7 dress-info">
                    <div class="dress-name">
                        <h3>{{$shop->shop_name}}</h3>
                        <span>Owner: {{$shop->user->user_name}}</span>
                        <div class="clearfix"></div>
                        <p>{{$shop->description}}</p>
                    </div>
                    <div class="span span1">
                        <p class="col-xs-4">LOCATION</p>
                        <p class="col-xs-6 col-xs-offset-2">{{$shop->location}}, {{$shop->zipcode->city->city_name}}<br>{{$shop->zipcode->city->state->state_name}} - {{$shop->zipcode->code}}</p>
                        <div class="clearfix"></div>
                    </div>

                    <script src="{{asset('js/imagezoom.js')}}"></script>
                    <!-- FlexSlider -->
                    <script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
                    <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function() {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection