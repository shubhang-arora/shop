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
                                    @include('errors.list')
                                </div>
                            </div>
                        @endif
                        <p>Welcome, please enter the following details to continue.</p>
                        <p>If you have previously registered with us, <a href="#">click here</a></p>
                        {!! Form::open(['id'=>'shopRegister','action'=>'ShopController@store', 'enctype'=>"multipart/form-data"]) !!}
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
                            <li class="text-info">{!! Form::textarea('description',null,['cols'=>'30','rows'=>'5']) !!}</li>
                        </ul>

                        <ul>
                            <li class="text-info">{!! Form::label('password','Password') !!}</li>
                            <li class="text-info">{!! Form::password('password',null) !!}</li>
                        </ul>
                        <div id="upload_images" class="dropzone"></div>

                        <br>
                        {!! Recaptcha::render() !!}
                        <input type="submit" value="Register Shop">
                        {!! Form::close() !!}

                    </div>
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
        var count = 0;
        Dropzone.autoDiscover = false;
        var imageUploadDropzone = new Dropzone("div#upload_images", {
            url: "/upload/image",
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            dictDefaultMessage: 'Upload images which describe your business<br>First image will be selected as thumbnail'
        });
        imageUploadDropzone.on('sending', function (file, xhr, formData) {
            formData.append('_token', $('[name=_token]').attr('content'));
        });
        imageUploadDropzone.on('success', function (file, data) {
            data = JSON.parse(data);

            $('<input>').attr({
                type: 'hidden',
                name: 'image'+count,
                value: data.path
            }).appendTo('form');
            count++;
        });
    </script>
@endsection

@section('head')
    <title>Create Shop - Businessway</title>
    {!! HTML::style('css/dropzone.css') !!}
    {!! HTML::script('js/dropzone.js') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endsection