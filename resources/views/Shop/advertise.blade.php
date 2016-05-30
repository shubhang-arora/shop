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
                            {!! Form::open(['action'=>'ShopController@postAdvertise', 'enctype'=>"multipart/form-data"]) !!}
                            {!! csrf_field() !!}
                            <ul>
                                <li class="text-info">{!! Form::label('title','Title') !!}</li>
                                <li class="text-info">{!! Form::text('title',null) !!}</li>
                            </ul>

                            <ul>
                                <li class="text-info">{!! Form::label('description','Description') !!}</li>
                                <li class="text-info">{!! Form::textarea('description',null) !!}</li>
                            </ul>

                            <ul>
                                <li class="text-info">{!! Form::label('banner','Banner') !!}</li>
                                <li class="text-info"><input type="submit" class="fileUp" value="Upload"></li>
                                <input type="file" name="banner" style="display: none;" id="actualFile">
                            </ul>

                            <input type="submit" value="Add Advertisement">
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="{{asset('js/fileUpButton.js')}}"></script>
@endsection

@section('head')
    <title>Add Advertisement - Businessway</title>
@endsection