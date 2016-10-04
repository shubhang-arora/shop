<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}'">
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}'">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Sign Up</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

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
    <div class="header header-filter" style="background-size: cover; background: url('{{asset('/img/city.jpg')}}')">
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
											<i class="material-icons">face</i>
										</span>
                                    <input name="user_name" type="text" id="user_name" title="name" class="form-control"
                                           placeholder="Your Name">
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
                                    <input name="email" type="email" id="email" title="E-Mail" class="form-control"
                                           placeholder="E-Mail">
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">phone</i>
										</span>
                                    <input type="text" name="phone" id="phone" title="phone" class="form-control"
                                           placeholder="Contact">
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
                                    <input type="password" name="password" id="password" placeholder="Password"
                                           class="form-control"/>
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock</i>
										</span>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                           placeholder="Confirm Password" class="form-control"/>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        {!! Recaptcha::render() !!}
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
<!--   Core JS Files   -->
<script src="{{asset('/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/material.min.js')}}"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('/js/nouislider.min.js')}}" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="{{asset('/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="{{asset('/js/material-kit.js')}}" type="text/javascript"></script>

</html>
