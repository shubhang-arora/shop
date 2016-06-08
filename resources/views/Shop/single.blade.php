@extends('app')

@section('content')
    <div class="container">
        <div class="products-page">
            @if($shop->offers->count()!=0)
            <div class="products">
                <div class="product-list">
                    <h2>Our Offers</h2>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @foreach($shop->offers as $offer)
                        <div class="panel panel-info">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed offerTab" role="button" data-toggle="collapse" data-parent="#accordion" href="#{{$offer->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                        {{$offer->title}}
                                    </a>
                                </h4>
                            </div>
                            <div id="{{$offer->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    {{$offer->description}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            <div class=" @if($shop->offers->count()!=0) new-product @else col-md-12 @endif">
                <div class="row">
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
                        <p class="col-xs-6 col-xs-offset-2" id="address">{{$shop->location}}, {{$shop->zipcode->city->city_name}}<br>{{$shop->zipcode->city->state->state_name}} - {{$shop->zipcode->code}}</p>
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
                <div class="row">
                    <div class="col-xs-12">
                        <div id="map"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        {!! Form::open(['action'=>'ShopController@sendMail','method'=>'post','id'=>'mailForm']) !!}

                        <div class="form-group">
                            <h2>Contact Us</h2>
                            <textarea class="form-control" rows="5" id="message" name="message" placeholder="Write Us a Mail"></textarea>
                            <input type="hidden" name="userID" value="{{$shop->user->id}}">
                        </div>
                        <a class="acount-btn" type="submit" href="javascript:{}" onclick="document.getElementById('mailForm').submit();">Send Mail</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: {lat: -34.397, lng: 150.644}
            });
            var geocoder = new google.maps.Geocoder();
            geocodeAddress(geocoder, map);
        }

        function geocodeAddress(geocoder, resultsMap) {
            var address = $('p#address').text();
            geocoder.geocode({'address': address}, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc7mptKA_kkJP2dmYZxvYzZt-iOKdKk7s&callback=initMap">
    </script>
@endsection

@section('head')
    <title>{{$shop->shop_name}} - Businessway</title>
@endsection