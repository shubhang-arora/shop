@extends('master')

@section('content')
    @include('include.header',['material'=>false])
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
            <br>
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
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
@endsection