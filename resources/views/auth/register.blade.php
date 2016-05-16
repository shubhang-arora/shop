@extends('app')

@section('content')
@if (session('status'))
    <div class="alert-message error">
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
        <!-- registration-form -->
    <div class="registration-form">
        <div class="container">
            <div class="dreamcrub">
                <ul class="breadcrumbs">
                    <li class="home">
                        <a href="{{action('Auth\AuthController@getLogin')}}" title="Go to Home Page">Home</a>&nbsp;
                        <span>&gt;</span>
                    </li>
                    <li class="women">
                        Registration
                    </li>
                </ul>
                <ul class="previous">
                    <li><a href="{{action('Auth\AuthController@getRegister')}}">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <h2>Registration</h2>
            <div class="registration-grids">
                <div class="reg-form">
                    <div class="reg">
                        <p>Welcome, please enter the following details to continue.</p>
                        <p>If you have previously registered with us, <a href="#">click here</a></p>
                            {!! Form::open(['action'=>'Auth\AuthController@getRegister']) !!}
                            {!! csrf_field() !!}
                        <ul>
                            <li class="text-info">{!! Form::label('user_name','Your Name:') !!}</li>
                            <li class="text-info">{!! Form::text('user_name',null) !!}</li>
                        </ul>


                        <ul>
                            <li class="text-info">{!! Form::label('email','Email') !!}</li>
                            <li class="text-info">{!! Form::text('email',null) !!}</li>
                        </ul>

                        <ul>
                            <li class="text-info">{!! Form::label('phone','Contact') !!}</li>
                            <li class="text-info">{!! Form::text('phone',null) !!}</li>
                        </ul>

                        <ul>
                            <li class="text-info">{!! Form::label('password','Password') !!}</li>
                            <li class="text-info">{!! Form::password('password',null) !!}</li>
                        </ul>

                        <ul>
                            <li class="text-info">{!! Form::label('password_confirmation','Confirm Password') !!}</li>
                            <li class="text-info">{!! Form::password('password_confirmation',null) !!}</li>
                        </ul>

                        {!! Recaptcha::render() !!}
                        <div>
                            <button type="submit">Register</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="reg-right">
                    <h3>Completely Free Account</h3>
                    <div class="strip"></div>
                    <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio
                        libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
                    <h3 class="lorem">Lorem ipsum dolor.</h3>
                    <div class="strip"></div>
                    <p>Tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- registration-form -->


@endsection

@section('head')
    <title>Register - Businessway</title>
@endsection