@extends('app')

@section('content')
    @if(isset($adverts))
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators hidden">
                @foreach($adverts as $key=>$advert)
                    <li data-target="#carousel-example-generic"
                        data-slide-to="{{$key}} @if($key==0) active @endif "></li>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach($adverts as $key=>$advert)
                    <div class="item @if($key==0) active @endif ">
                        <img src="{{asset($advert->banner)}}" alt="{{$advert->title}}" class="img-responsive">
                        <div class="carousel-caption">
                            <h3>{{$advert->title}}</h3>
                            <p>{{$advert->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @endif
    <div class="products-grid">
        <header>
            <h3 class="head text-center">Shops</h3>
        </header>
        <article class="page-content">

            <div class="col-sm-4">
                <h4>{!! Form::label('category','Filter by Category : ') !!}</h4>
                {!! Form::select('category',$categories,null,['optional' => 'Select','id'=>'category','style'=>'width: 100%']) !!}
            </div>

            <div class="col-sm-4">
                <h4>{!! Form::label('city','Filter by City : ') !!}</h4>
                {!! Form::select('city',$cities,null,['optional' => 'Select','id'=>'city','style'=>'width: 100%']) !!}

            </div>
            <div class="col-sm-4">
                {!! Form::open(['action'=>'ShopController@search','method'=>'post','id'=>'searchForm']) !!}
                <h4><label for="search">Search</label></h4>
                <input type="text" class="form-control" name="shopName" id="search"
                       placeholder="Type shop name and press enter" required>
                {!! Form::close() !!}
            </div>
        </article>
        @foreach($shops as $key=>$shop)
            <div class="col-lg-4 col-md-6">
                <div class="product simpleCart_shelfItem text-center" id="shopCard"
                     data-city="{{$shop->zipcode->city->id}}"
                     data-category="@foreach($shop->categories as $category){{$category->id}} @endforeach">
                    <div id="box">
                        <a href="{{action('ShopController@show',$shop->id)}}"><img
                                    src="{{asset($shop->images[0]->link)}}"
                                    alt="{{$shop->shop_name}}"/></a>
                        <a class="product_name"
                           href="{{action('ShopController@show',$shop->id)}}">{{$shop->shop_name}}</a>
                        <p>
                            <a class="item_add" href="#"><i></i>
                                <span class="item_price">Owner : {{$shop->user->user_name}}</span>
                            </a>
                        </p>
                    </div>
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
    <script>

        var category = $('#category');
        var city = $('#city');
        category.select2();
        city.select2();
        setTimeout(function () {
            filter(city.val(), category.val());
            category.append($("<option></option>").attr("value", 'All').text('All'));
            city.append($("<option></option>").attr("value", 'All').text('All'));
        }, 500);
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
    <title>Businessway</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endsection