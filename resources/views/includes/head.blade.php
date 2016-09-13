<link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>

</script>
<!-- Custom Theme files -->
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Eshop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<!-- for bootstrap working -->
<script type="text/javascript" src="{{asset('js/bootstrap-3.1.1.min.js')}}"></script>
<!-- //for bootstrap working -->
<!-- cart -->
<script src="{{asset('js/simpleCart.min.js')}}"> </script>
<!-- cart -->
<link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />
<link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
<meta name="_token" content="{{ csrf_token() }}">
{{--<script src="https://use.fontawesome.com/47c04783bd.js"></script>--}}
<meta property="og:url" content="{{request()->url()}}"/>
<meta property="og:type" content="company"/>
<meta property="fb:app_id" content="308477322845753"/>

@yield('head')