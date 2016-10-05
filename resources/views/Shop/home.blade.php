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
    @include('include.header',['material'=>false])

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

    <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>

    {!! HTML::script('js/dropzone.js') !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {!! HTML::style('css/dropzone.css') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>

@endsection