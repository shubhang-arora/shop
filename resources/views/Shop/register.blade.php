@extends('app')

@section('content')
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
                <div class="clearfix"></div>
            </div>
            <h2>Registration</h2>
            <div class="registration-grids">
                <div class="reg-form">
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
                        <p>Welcome, please enter the following details to continue.</p>
                        <p>If you have previously registered with us, <a href="#">click here</a></p>
                        {!! Form::open(['action'=>'ShopController@store', 'enctype'=>"multipart/form-data"]) !!}
                        {!! csrf_field() !!}
                        <ul>
                            <li class="text-info">{!! Form::label('shop_name','Shop Name:') !!}</li>
                            <li class="text-info">{!! Form::text('shop_name',null) !!}</li>
                        </ul>

                        <ul>
                            <li class="text-info">{!! Form::label('categories','Category') !!}</li>
                            <li class="text-info">{!! Form::select('categories[]',$categories,null,['class'=>'required-item','id'=>'tag_list','aria-required'=>'true','multiple','style'=>'width:100%']) !!}</li>
                        </ul>


                        <ul>
                            <li class="text-info">{!! Form::label('location','Location') !!}</li>
                            <li class="text-info">{!! Form::text('location',null) !!}</li>
                        </ul>

                        <ul>
                            <li class="text-info">{!! Form::label('state','State') !!}</li>
                            <li class="text-info">{!! Form::select('state',$states,null,['style'=>'width:100%']) !!}</li>
                        </ul>


                        <ul>
                            <li class="text-info">{!! Form::label('city','City') !!}</li>
                            <li class="text-info">{!! Form::select('city',$cities,null,['style'=>'width:100%']) !!}</li>
                        </ul>

                        <ul>
                            <li class="text-info">{!! Form::label('zipcode','Zipcode:') !!}</li>
                            <li class="text-info">{!! Form::select('zipcode',$zipcodes,null,['style'=>'width:100%']) !!}</li>
                        </ul>

                        <ul>
                            <li class="text-info">{!! Form::label('premium_shop','Premium Shop') !!}</li>
                            <li class="text-info">{!! Form::checkbox('premium_shop',null) !!}</li>
                        </ul>

                        <ul>
                            <li class="text-info">{!! Form::label('description','Description') !!}</li>
                            <li class="text-info">{!! Form::textarea('description',null) !!}</li>
                        </ul>

                        <ul>
                            <li class="text-info">{!! Form::label('password','Password') !!}</li>
                            <li class="text-info">{!! Form::password('password',null) !!}</li>
                        </ul>

                        <ul>
                            <div id="upload_images">

                            </div>
                        </ul>

                        {!! Recaptcha::render() !!}
                        <input type="submit" value="Register Shop">
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="reg-right">
                    <h3>Completely Free Account</h3>
                    <div class="strip"></div>
                    <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus
                        tincidunt tempus aliquam, odio
                        libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum.
                        Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac
                        lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
                    <h3 class="lorem">Lorem ipsum dolor.</h3>
                    <div class="strip"></div>
                    <p>Tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent
                        porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis
                        hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- registration-form -->


@endsection

@section('scripts')
    <script src="{{asset('js/fileUpButton.js')}}"></script>
    <script>
        $('select').each(function (index, value) {
            $(value).select2()
        });
    </script>
    <script>
        $("div#upload_images").dropzone({url: "upload/image"});
    </script>
@endsection

@section('head')
    <title>Create Shop - Businessway</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endsection