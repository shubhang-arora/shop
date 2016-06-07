@extends('app')

@section('content')
    <div class="products-grid">
        <header>
            <h3 class="head text-center">Admin Panel</h3>
        </header>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{url('/manage-shop')}}" type="button" class="btn btn-default btn-lg btn-block">Put an
                        Advertisement</a>
                </div>
                <div class="col-md-6">
                    <a href="{{url('/add-shop')}}" type="button" class="btn btn-default btn-lg btn-block">Add Shops</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{url('/manage-shop')}}" type="button" class="btn btn-default btn-lg btn-block">Manage
                        Existing Shops</a>
                </div>
                <div class="col-md-6">
                    <a href="{{url('/deleted-shops')}}" type="button" class="btn btn-default btn-lg btn-block">Deleted
                        Shops</a>
                </div>
            </div>
        </div>
        <div class="reg">
            <div class="text-center">
                {!! Form::open(['action'=>'ShopController@search','id'=>'searchForm']) !!}

                <ul>
                    <li class="text-info">
                        <label for="search">Search</label>
                        <input type="text" class="form-control" name="shopName" id="search"
                               placeholder="Type shop name and press enter" required>
                    </li>
                </ul>

                {!! Form::close() !!}
            </div>

        </div>
    </div>
@endsection

@section('scripts')

@endsection

@section('head')
    <title>Admin - Businessway</title>

@endsection