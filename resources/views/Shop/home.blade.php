@extends('app')

@section('content')
    <div class="products-grid">
        <header>
            <h3 class="head text-center">Shops</h3>
        </header>
        <article class="page-content">
            <div class="col-sm-6">
                <h3>{!! Form::label('category','Filter by Category : ') !!}</h3>
                {!! Form::select('category',$categories,null,['optional' => 'Select','id'=>'category']) !!}
            </div>
            <div class="col-sm-6">
                <h3>{!! Form::label('city','Filter by City : ') !!}</h3>
                {!! Form::select('city',$cities,null,['optional' => 'Select','id'=>'city']) !!}

            </div>

        </article>
        @foreach($shops as $key=>$shop)
            <div class="col-md-4 col-sm-6 col-xs-12 product simpleCart_shelfItem text-center" id="shopCard" data-city="{{$shop->zipcode->city->id}}" data-category="@foreach($shop->categories as $category){{$category->id}} @endforeach">
                <div id="box">
                    <a href="{{action('ShopController@show',$shop->id)}}"><img src="{{asset($shop->images[0]->link)}}" alt="{{$shop->shop_name}}" /></a>
                    <div class="mask">
                        <a href="{{action('ShopController@show',$shop->id)}}">Quick View</a>
                    </div>
                    <a class="product_name" href="{{action('ShopController@show',$shop->id)}}">{{$shop->shop_name}}</a>
                    <p><a class="item_add" href="#"><i></i> <span class="item_price">Owner : {{$shop->user->user_name}}</span></a></p>
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
            setTimeout(function () {
                filter(city.val(),category.val());
                category.append($("<option></option>").attr("value",'All').text('All'));
                city.append($("<option></option>").attr("value",'All').text('All'));
            },500);
            $(document).on('change','#city', function () {
                setTimeout(function () {
                    filter(city.val(),category.val());
                },500);

            });
            $(document).on('change','#category', function () {
                setTimeout(function () {
                    filter(city.val(),category.val());
                },500);

            });


            function filter(city,category){

                $('[id="shopCard"]').each(function () {
                    if($(this).data().city&&$(this).data().category){
                        if(city=="All" && category=="All"){
                            $(this).show();
                        }
                        else if (category=="All"){
                            if($(this).data().city!=city){
                                $(this).hide();
                            }
                            else{
                                $(this).show();
                            }
                        }
                        else if (city=="All"){
                            if($(this).data().category.split(' ').indexOf(category)==-1){
                                $(this).hide();
                            }
                            else{
                                $(this).show();
                            }
                        }
                        else if ($(this).data().city!=city||$(this).data().category.split(' ').indexOf(category)==-1)
                        {
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
@endsection