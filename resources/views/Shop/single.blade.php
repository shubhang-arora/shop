@extends('master')
@section('head')
    <title>{{$shop->shop_name}} - E Shoppee</title>


    <meta property="og:title" content="{{$shop->shop_name}}"/>
    <meta property="og:description" content="{{$shop->description}}"/>
    {{--*/$fav=0/*--}}
    @foreach($shop->images as $img)
        @if($img->fav)
            {{--*/$fav=1/*--}}
            <meta property="og:image" content="{!! request()->getSchemeAndHttpHost().$img->link !!}"/>
            <meta property="og:image:width" content="400"/>
        @endif
        @if(!$fav)
            <meta property="og:image" content="{!! request()->getSchemeAndHttpHost().$shop->images[0]->link !!}"/>
            <meta property="og:image:width" content="400"/>
        @endif
    @endforeach

    <link href="{{asset('/css/shop_style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('/css/material-kit.css')}}" rel="stylesheet"/>
@endsection
@section('content')
    @include('include.header')
    <div class="wrapper">
        <div class="header header-filter"
             style="background-size: cover; background: url('/img/city.jpg') top center;">
            <div class="container">
                <div class="row">
                    <!-- 					<div class="col-md-2"></div>
                     -->
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-signup">

                            <div class="col-md-12 col-sm-12">
                                <div class="carousel slide article-slide" id="article-photo-carousel">

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner cont-slider">
                                        @foreach($shop->images as $key=>$image)
                                            <div class="item @if($key==0) active @endif">
                                                <img style="height: 40vh" alt="" title="" src="{{asset($image->link)}}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        @foreach($shop->images as $key=>$image)
                                            <li class="@if($key==0) active @endif" data-slide-to="{{$key}}"
                                                data-target="#article-photo-carousel">
                                                <img alt="" title="" src="{{asset($image->link)}}">
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                                <script type="text/javascript">
                                    // Stop carousel
                                    $('.carousel').carousel({
                                        interval: false
                                    });
                                </script>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="shop-info">
                                    <h2><b>{{$shop->shop_name}}</b></h2>
                                    <h3><b>Owner:</b> {{$shop->user->user_name}}</h3>
                                    <h3><b>Location:</b> <span id="location">{{$shop->location}}</span>,
                                        <span id="city">{{$shop->zipcode->city->city_name}}</span><br><span
                                                id="state">{{$shop->zipcode->city->state->state_name}}</span> - <span
                                                id="zipcode">{{$shop->zipcode->code}}</span></h3>
                                    <h3><b>Number of Views:</b> {{$shop->views->count()}}</h3>
                                    <div style="display: flex">
                                        <h3><b>Like this shop</b>
                                            <span class="heart @if($liked) liked @endif" id="{{$shop->id}}" style="vertical-align:middle"
                                                  rel="like">
                                        </span>
                                        </h3>
                                    </div>
                                    <h3><b>Number of Likes:</b> <span class="likeCount"
                                                                      id="{{$shop->id}}">{{$shop->likeCount}}</span>
                                    </h3>

                                    <br>
                                    <div class="fb-share-button" data-href="{{request()->url()}}"
                                         data-layout="button"></div>
                                    <br>
                                    @if($shop->offers->count()!=0)
                                        <h2><b>Offers</b></h2>
                                        @foreach($shop->offers as $offer)
                                            <a style="color: inherit; font-weight: bolder"
                                               href="{{url('offer/'.$offer->id)}}"><h3><b><i class="material-icons"
                                                                                             style="font-size: 20px;">done</i></b>&nbsp;{{$offer->title}}
                                                </h3></a>
                                        @endforeach

                                        <br>
                                        <br>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--    <div class="container">
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
                            <p class="col-xs-6 col-xs-offset-2" id="address"><span id="location">{{$shop->location}}</span>,
                                <span id="city">{{$shop->zipcode->city->city_name}}</span><br><span
                                        id="state">{{$shop->zipcode->city->state->state_name}}</span> - <span
                                        id="zipcode">{{$shop->zipcode->code}}</span></p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="likeCount col-sm-2 col-xs-4">Views: {{$shop->views->count()}}</div>
                            <div class="heart @if($liked) liked @endif col-sm-1 col-xs-2" id="{{$shop->id}}" rel="like">
                            </div>
                            --}}{{--<i class="fa fa-heart-o" style="font-size: larger; color: #2f95ff " aria-hidden="true"></i>--}}{{--
                            --}}{{--<i class="fa fa-heart" style="font-size: larger; color: #2f95ff " aria-hidden="true"></i>--}}{{--

                            <div class="likeCount col-sm-1 col-xs-2" style="right: 3%"
                                 id="{{$shop->id}}">{{$shop->likeCount}}</div>
                            <div class="col-sm-7 col-xs-4 likeCount">
                                <div class="fb-share-button" data-href="{{request()->url()}}"
                                     data-layout="button"></div>
                            </div>

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
                    <br><br>
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
        </div>--}}

@endsection

@section('scripts')
    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="{{asset('/js/material.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/material-kit.js')}}" type="text/javascript"></script>
    <script>
        $('body').on("click", '.heart', function () {
            var id = $(this).attr("id");
            $(this).css("background-position", "");
            var liked = $(this).hasClass("liked");
            if (liked) {
                console.log();
                $(this).removeClass('liked');
                $(this).removeClass('heartAnimation');
                $('.likeCount[id="' + id + '"').text(parseInt($('.likeCount[id="' + id + '"').text()) - 1);
            }
            else {
                $(this).addClass('liked');
                $(this).addClass("heartAnimation").attr("rel", "unlike"); //applying animation class
                $('.likeCount[id="' + id + '"').text(parseInt($('.likeCount[id="' + id + '"').text()) + 1);
            }
            $.ajax({
                type: "POST",
                url: "/like",
                data: {'id': id, '_token': $('[name=_token]').attr('content')},
                cache: false,
                success: function (data) {
                    var like = data.count;
                    $('.likeCount[id="' + id + '"').text(like);
                }
            });


        });
    </script>
@endsection