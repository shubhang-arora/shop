@extends('master')

@section('content')
    {{--

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="carousel fade-carousel1 slide" data-ride="carousel" data-interval="100" id="bs-carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
    <li data-target="#bs-carousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="overlay1"></div>
      <div class="slide-1"></div>
      <div class="hero">
        <hgroup>
            <h1>Advertisement Title</h1>
            <h3>Advertisement Description</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">Head Over to the Advertisement</button>
      </div>
    </div>
    <div class="item slides">
      <div class="overlay1"></div>
      <div class="slide-2"></div>
      <div class="hero">
        <hgroup>
            <h1>Advertisement Title</h1>
            <h3>Advertisement Description</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">Head Over to the Advertisement</button>
      </div>
    </div>
    <div class="item slides">
      <div class="overlay1"></div>
      <div class="slide-3"></div>
      <div class="hero">
        <hgroup>
            <h1>Advertisement Title</h1>
            <h3>Advertisement Description</h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">Head Over to the Advertisement</button>
      </div>
    </div>
  </div>
</div>
<script language="JavaScript" type="text/javascript">
  $(document).ready(function(){
    $('.fade-carousel1').carousel({
      interval: 2000
    })
  });
</script>
</div>
</div>

<br>
--}}

    <div class="row header">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-12">
            <div class="col-md-3 col-sm-12">
                <h1 class="display-4"><a href="{{url('/')}}">Businessway</a></h1>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        {!! Form::open(['action'=>'ShopController@search','method'=>'post','id'=>'searchForm']) !!}
                        <input type="text" class="form-control input-lg" name="shopName" id="search"
                               placeholder="Search Shop" required>
                        {!! Form::close() !!}
                        <span class="input-group-btn">
                            <a class="btn btn-info btn-lg"
                               onclick="if($('[name=shopName]').val()!=''){$('form#searchForm').trigger('submit')}">Search</a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-6">
                @if(\Illuminate\Support\Facades\Auth::check())
                    <div class="authen-box">
                        <a href="{{url('auth/logout')}}"><span class="btn btn-default btn-lg"><i class="glyphicon glyphicon-log-out"></i> Logout</span></a>
                    </div>
                @else
                    <div class="authen-box">
                        <a href="{{url('auth/login')}}"><span class="btn btn-default btn-lg"><i
                                        class="glyphicon glyphicon-user"></i> Login</span></a>
                        &nbsp;
                        <a href="{{url('auth/register')}}"><span class="btn btn-default btn-lg"><i
                                        class="glyphicon glyphicon-lock"></i> Register</span></a>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-2 col-sm-12">
            <div class="offers">
                <a href="{{url('offers')}}"><span class="btn btn-default btn-lg"><i
                                class="glyphicon glyphicon-gift"></i> Click here for All Offers</span></a>
            </div>
        </div>
    </div>
    <br>


    <!--Adverts Carousel-->
    @if(isset($adverts))
        @if($adverts->count())
            <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="100" id="bs-carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach($adverts as $key=>$advert)
                        <li data-target="#bs-carousel" data-slide-to="{{$key}}"
                            class="@if($key==0) active @endif "></li>
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach($adverts as $key=>$advert)
                        <div class="item slides @if($key==0) active @endif ">
                            <div class="overlay"></div>
                            <div class="slide-1"
                                 style="background-size: cover; background: url('{{asset($advert->banner)}}')"></div>
                            <div class="hero">
                                <hgroup>
                                    <h1>{{$advert->title}}</h1>
                                    <h3>{{$advert->description}}</h3>
                                </hgroup>
                                <a href="{{url('/shops/'.$advert->shop->id)}}" class="btn btn-hero btn-lg"
                                   role="button">Head Over to the Shop</a>
                        </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <script language="JavaScript" type="text/javascript">
                $(document).ready(function () {
                    $('.carousel').carousel({
                        interval: 4000
                    })
                });
            </script>
        @endif
    @endif
    <div class="products-grid">
        <br>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            {!! Form::select('category',$categories,null,['optional' => 'Select','id'=>'category','style'=>'width: 100%','placeholder'=>'Filter by Categories']) !!}
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            {!! Form::select('city',$cities,null,['optional' => 'Select','id'=>'city','style'=>'width: 100%','placeholder'=>'Filter by Cities']) !!}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        @if($shops->where('premium_shop',1)->count())
            <div class="row">
                <h1 style="text-align: center;" class="shops">Premium Shops</h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @foreach($shops as $key=>$shop)
                        <div class="col-md-3">
                            <div class="card" id="shopCard"
                                 data-city="{{$shop->zipcode->city->id}}"
                                 data-category="@foreach($shop->categories as $category){{$category->id}} @endforeach">
                                <div class="card-image">
                                    <a href="{{action('ShopController@show',$shop->id)}}"><img class="img-responsive"
                                                                                               src=" @foreach($shop->images as $image) @if($image->fav) {{$image->link}} @endif @endforeach"
                                                                                               title="{{$shop->shop_name}}"></a>
                                </div>

                                <div class="card-content">
                                    <span class="card-title">{{$shop->shop_name}}</span>
                                </div>

                                <div class="card-action">
                                    <p class="card-content-title">{{$shop->description}}</p>
                                    <a href="{{action('ShopController@show',$shop->id)}}" target="new_blank">Head Over
                                        to the Shop</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
            </div>
            <br>
        @endif
        @if($shops->where('premium_shop',0)->count())
            <div class="row">
                <h1 style="text-align: center;" class="shops">Shops</h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @foreach($shops as $key=>$shop)
                        <div class="col-md-3">
                            <div class="card" id="shopCard"
                                 data-city="{{$shop->zipcode->city->id}}"
                                 data-category="@foreach($shop->categories as $category){{$category->id}} @endforeach">
                                <div class="card-image">
                                    <a href="{{action('ShopController@show',$shop->id)}}"><img class="img-responsive"
                                                                                               src=" @foreach($shop->images as $image) @if($image->fav) {{$image->link}} @endif @endforeach"
                                                                                               title="{{$shop->shop_name}}"></a>
                                </div>

                                <div class="card-content">
                                    <span class="card-title">{{$shop->shop_name}}</span>
                                </div>

                                <div class="card-action">
                                    <p class="card-content-title">{{$shop->description}}</p>
                                    <a href="{{action('ShopController@show',$shop->id)}}" target="new_blank">Head Over
                                        to
                                        the Shop</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <br>
    </div>

@endsection
@section('scripts')
    <script>

        var category = $('#category');
        var city = $('#city');
        category.select2({
            placeholder: "Filter by Categories",
            allowClear: true
        });
        city.select2({
            placeholder: "Filter by Cities",
            allowClear: true
        });

        setTimeout(function () {
            category.append($("<option></option>").attr("value", 'All').text('All Categories').attr('selected', true));
            city.append($("<option></option>").attr("value", 'All').text('All Cities').attr('selected', true));
        }, 10);

        setTimeout(function () {
            filter('All', 'All');
        }, 100);

        $(document).on('change', '#city', function () {
            setTimeout(function () {
                filter(city.val(), category.val());
            }, 500);

        });
        $(document).on('change', '#category', function () {
            setTimeout(function () {
                filter(city.val(), category.val());
            }, 500);

        });


        function filter(city, category) {

            $('[id="shopCard"]').each(function () {
                if ($(this).data().city && $(this).data().category) {
                    if (city == "All" && category == "All") {
                        $(this).show();
                    }
                    else if (category == "All") {
                        if ($(this).data().city != city) {
                            $(this).hide();
                        }
                        else {
                            $(this).show();
                        }
                    }
                    else if (city == "All") {
                        if ($(this).data().category.split(' ').indexOf(category) == -1) {
                            $(this).hide();
                        }
                        else {
                            $(this).show();
                        }
                    }
                    else if ($(this).data().city != city || $(this).data().category.split(' ').indexOf(category) == -1) {
                        $(this).hide();
                    }
                    else {
                        $(this).show();
                    }
                }
            });
        }
    </script>
@endsection

@section('head')
    <title>Home Page</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="_token" content="{{ csrf_token() }}">
    <meta property="og:url" content="{{request()->url()}}"/>
    <meta property="og:type" content="company"/>
    <meta property="fb:app_id" content="308477322845753"/>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <script src="https://use.fontawesome.com/47c04783bd.js"></script>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>


    {!! HTML::script('js/dropzone.js') !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {!! HTML::style('css/dropzone.css') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>




    {{--    <title>Businessway</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Home Page</title>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <!--   Core JS Files   -->
        <script src="{{asset('/js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="{{asset('/js/material.min.js')}}"></script>
        <script src="{{asset('/js/material-kit.js')}}"></script>
        {!! HTML::script('js/dropzone.js') !!}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



        <!-- CSS Files -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('/css/material-kit.css')}}" rel="stylesheet"/>
        {!! HTML::style('css/dropzone.css') !!}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>

        <!--     Fonts and icons     -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
        <script src="https://use.fontawesome.com/47c04783bd.js"></script>


        <meta name="_token" content="{{ csrf_token() }}">
        <meta property="og:url" content="{{request()->url()}}"/>
        <meta property="og:type" content="company"/>
        <meta property="fb:app_id" content="308477322845753"/>--}}
@endsection