<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}'">
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}'">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="_token" content="{{ csrf_token() }}">

    <title>Register Shop - Businessway</title>

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
    <div class="header header-filter" style="background-size: cover; background: url('{{asset('/img/city.jpg')}}');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-12 ">
                    <div class="card card-signup">
                        <form class="form" method="post" action="{{url('shop/register')}}">
                            {{csrf_field()}}
                            <div class="header header-primary text-center">
                                <h2><b>Register Your Shop</b></h2>
                            </div>
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
                                    {!! Form::textarea('description',null,['placeholder'=>'Shop Description','class'=>'form-control','rows'=>'5']) !!}
                                </div>


                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock</i>
										</span>
                                    <input type="password" id="password" name="password"
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


<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('/js/nouislider.min.js')}}" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="{{asset('/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="{{asset('/js/material-kit.js')}}" type="text/javascript"></script>
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
</body>

</html>
