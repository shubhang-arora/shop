@extends('master')

@section('head')
    <title>
        Create Advertisement
    </title>
    {!! HTML::style('css/dropzone.css') !!}
    {!! HTML::script('js/dropzone.js') !!}

    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}'">
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}'">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <!--   Core JS Files   -->
    <script src="{{asset('/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/material.min.js')}}"></script>
    <script src="{{asset('/js/material-kit.js')}}"></script>


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

    <meta name="_token" content="{{ csrf_token() }}">
    <meta property="og:url" content="{{request()->url()}}"/>
    <meta property="og:type" content="company"/>
    <meta property="fb:app_id" content="308477322845753"/>
@endsection
@section('content')
    @include('include.header',['material' => true])
    <div class="wrapper">
        <div class="header header-filter" style="background-size: cover; background: url('{{asset('/img/city.jpg')}}')">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-12 ">
                        <div class="card card-signup">
                            <form class="form" method="post" action="{{url('add/advertisement')}}">
                                {{csrf_field()}}
                                <div class="header header-primary text-center">
                                    <h2><b>Create new advertisement</b></h2>
                                </div>
                                <div class="content">
                                    @if($errors->any())
                                        @include('errors.list')
                                    @endif
                                    <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">record_voice_over</i>
										</span>
                                        <input name="title" type="text" id="title" title="title" class="form-control"
                                               placeholder="Title">
                                    </div>

                                    <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">description</i>
										</span>
                                        {!! Form::textarea('description',null,['placeholder'=>'Shop Description','class'=>'form-control','rows'=>'5']) !!}
                                    </div>

                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <div id="upload_images" class="dropzone"></div>
                                    </span>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <input type="submit" class="btn btn-simple btn-primary btn-lg" value="Get Started">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        Dropzone.autoDiscover = false;
        var imageUploadDropzone = new Dropzone("div#upload_images", {
            url: "/upload/image",
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            parallelUploads: 1,
            uploadMultiple: false,
            maxFiles: 1,
            dictDefaultMessage: 'Upload the banner for your advertisement',
            autoQueue: false
        });
        imageUploadDropzone.on('sending', function (file, xhr, formData) {
            formData.append('_token', $('[name=_token]').attr('content'));
        });
        imageUploadDropzone.on('success', function (file, data) {
            data = JSON.parse(data);

            $('<input>').attr({
                type: 'hidden',
                name: 'banner',
                value: data.path
            }).appendTo('form');
        });
    </script>
@endsection
