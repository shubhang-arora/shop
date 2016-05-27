@extends('app')

@section('content')

                <!-- registration-form -->
        <div class="registration-form">
            <div class="container">
                <div class="dreamcrub">
                    <ul class="breadcrumbs">
                        <li class="home">
                            <a href="{{url('/')}}" title="Go to Home Page">Home</a>&nbsp;
                            <span>&gt;</span>
                        </li>
                        <li class="women">
                            Add Offer
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <h2>Add Offer</h2>
                <div class="registration-grids">
                    <div class="col-xs-12">
                        <div class="reg">
                            @if (session('status'))
                                <div class="alert alert-danger">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if($errors->any())
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="page-content">
                                            @include('errors.list')
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <p>Welcome, please enter the following details to add a offer.</p>
                            {!! Form::open(['action'=>'ShopController@postOffer']) !!}
                            {!! csrf_field() !!}
                            <ul>
                                <li class="text-info">{!! Form::label('title','Title') !!}</li>
                                <li class="text-info">{!! Form::text('title',null) !!}</li>
                            </ul>

                            <ul>
                                <li class="text-info">{!! Form::label('daterange','Date Range') !!}</li>
                                <li class="text-info">{!! Form::text('daterange',null) !!}</li>
                            </ul>

                            <ul>
                                <li class="text-info">{!! Form::label('description','Description') !!}</li>
                                <li class="text-info">{!! Form::textarea('description',null) !!}</li>
                            </ul>

                            <ul>
                                <li class="text-info">{!! Form::label('premium_offer','Premium Offer') !!}</li>
                                <li class="text-info">{!! Form::checkbox('premium_offer',null) !!}</li>
                            </ul>

                            <input type="submit" value="Add Offer">
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script>
        console.log(moment());
        var minDate = new Date().toJSON().slice(0, 10);
        $('input[name="daterange"]').daterangepicker({
            "minDate": moment(),
"locale": {
            "format": "YYYY/MM/DD"
        }
        });
    </script>
@endsection

@section('head')
    <title>Add Offer - Businessway</title>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
@endsection
