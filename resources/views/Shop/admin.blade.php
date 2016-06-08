@extends('app')

@section('content')
    <div class="products-grid">
        <header>
            <h3 class="head text-center">Admin Panel</h3>
        </header>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-6">
                        <a href="{{url('/add-shop')}}" type="button" class="btn btn-default btn-lg btn-block">Add
                            Shops</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{url('/admin/approve/advertisement')}}" type="button"
                           class="btn btn-default btn-lg btn-block">Approve
                            Advertisements</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-6">
                        <a href="{{url('/manage-shop')}}" type="button" class="btn btn-default btn-lg btn-block">Manage
                            Existing Shops</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{url('/deleted-shops')}}" type="button" class="btn btn-default btn-lg btn-block">Deleted
                            Shops</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-12">
                        {!! Form::open(['action'=>'ShopController@search','id'=>'searchForm']) !!}
                        <input type="text" class="form-control" name="shopName" id="search" placeholder="Search Shops"
                               data-toggle="tooltip" data-placement="top" title="Type shop name and press enter"
                               required>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection

@section('head')
    <title>Admin - Businessway</title>
@endsection