@extends('app')

@section('content')
    <div class="container">
        <div class="products-page">
            <div class="products">
                <div class="product-listy">
                    <h2>Our Offers</h2>
                    <ul class="product-list">
                        @foreach($shop->offers as $offer)
                            <li><a href="">{{$offer->title}}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="new-product">
                <div class="col-md-5 zoom-grid">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="images/si.jpg">
                                <div class="thumb-image"> <img src="{{asset('images/si.jpg')}}" data-imagezoom="true" class="img-responsive" alt="" /> </div>
                            </li>
                            <li data-thumb="images/si1.jpg">
                                <div class="thumb-image"> <img src="{{asset('images/si1.jpg')}}" data-imagezoom="true" class="img-responsive" alt="" /> </div>
                            </li>
                            <li data-thumb="images/si2.jpg">
                                <div class="thumb-image"> <img src="{{asset('images/si2.jpg')}}" data-imagezoom="true" class="img-responsive" alt="" /> </div>
                            </li>
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