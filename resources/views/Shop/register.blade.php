{{--

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

--}}


        <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}'">
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}'">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Create Shop - Businessway</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <!--   Core JS Files   -->
    <script src="{{asset('/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/material.min.js')}}"></script>

    {!! HTML::style('css/dropzone.css') !!}
    {!! HTML::script('js/dropzone.js') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <!-- CSS Files -->
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('/css/material-kit.css')}}" rel="stylesheet"/>

</head>

<body class="signup-page">
<div class="wrapper">
    <div class="header header-filter" style="background-size: cover; background: url('{{asset('/img/city.jpg')}}'">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-12 ">
                    <div class="card card-signup">
                        <form class="form" method="post" action="{{url('auth/register')}}">
                            {{csrf_field()}}
                            <div class="header header-primary text-center">
                                <h2><b>Sign Up</b></h2>
                            </div>
                            <p class="text-divider">Or if you have an account <a href='{{url('auth/login')}}'>Click
                                    here</a></p>
                            <div class="content">
                                @if($errors->any())
                                    @include('errors.list')
                                @endif
                                <div class="input-group">
										<span class="input-group-addon">
                                            <i class="material-icons">store_mall_directory</i>
                                        </span>
                                    {!! Form::text('shop_name',null,['placeholder'=>'Shop Name','class'=>"form-control"]) !!}
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">assignment</i>
										</span>
                                    {!! Form::select('categories[]',$categories,null,['class'=>'required-item','id'=>'tag_list','aria-required'=>'true','multiple','style'=>'width:100%']) !!}
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">person_pin</i>
										</span>
                                    {!! Form::text('location',null,['class'=>'form-control','placeholder'=>'Location']) !!}

                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">place</i>
										</span>
                                    <br>

                                    {!! Form::select('state',$states,null,['style'=>'width:100%']) !!}
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
                                            <i class="material-icons">location_city</i>
                                        </span>
                                    <br>

                                    {!! Form::select('city',$cities,null,['style'=>'width:100%']) !!}
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">my_location</i>
										</span>
                                    <br>

                                    {!! Form::select('zipcode',$zipcodes,null,['style'=>'width:100%']) !!}
                                </div>
                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">description</i>
										</span>
                                    {!! Form::textarea('description',null,['class'=>'form-control','rows'=>'5']) !!}
                                </div>


                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock</i>
										</span>
                                    <input type="password" id="password" name="confirmation"
                                           placeholder="Confirm Password" class="form-control"/>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <div id="upload_images" class="dropzone" style="width: 100%"></div>
                                        <br>
                                        {!! Recaptcha::render() !!}
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="footer text-center">
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox">
                                        Premium Shop
                                    </label>
                                </div>
                                <br>
                                <input type="submit" class="btn btn-simple btn-primary btn-lg" value="Get Started">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    Copyright &copy; 2016 | Businessway. All Rights Reserved.
                </div>
            </div>
        </footer>

    </div>

</div>
</body>


<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('/js/nouislider.min.js')}}" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="{{asset('/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="{{asset('/js/material-kit.js')}}" type="text/javascript"></script>
<script src="{{asset('js/fileUpButton.js')}}"></script>
<script>
    $('select').each(function (index, value) {
        $(value).select2({
            placeholder: "Categories"
        })
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
            name: 'image' + count,
            value: data.path
        }).appendTo('form');
        count++;
    });
</script>
</html>
