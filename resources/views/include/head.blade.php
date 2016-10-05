<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}">
<link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="_token" content="{{ csrf_token() }}">
<meta property="og:url" content="{{request()->url()}}"/>
<meta property="og:type" content="company"/>
<meta property="fb:app_id" content="308477322845753"/>

<!--     Fonts and icons     -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

<!--   Core JS Files   -->
<script src="{{asset('/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/bootstrap.min.js')}}" type="text/javascript"></script>

<!-- CSS Files -->
<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" />
@yield('head')