@extends('master')
@section('head')
    <title>Log In</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <!-- CSS Files -->
    <link href="{{asset('/css/material-kit.css')}}" rel="stylesheet"/>
@endsection
@section('content')
    <div class="wrapper">
        <div class="header header-filter" style="background-size: cover; background: url('{{asset('/img/city.jpg')}}'">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-12 ">
                        <div class="card card-signup">
                            <form class="form" method="post" action="{{url('auth/login')}}">
                                {{csrf_field()}}
                                <div class="header header-primary text-center">
                                    <h2><b>Log In</b></h2>
                                </div>
                                <p class="text-divider">Or if you don't have an account <a
                                            href='{{url('auth/register')}}'>Click
                                        here</a></p>
                                <div class="content">
                                    @if($errors->any())
                                        @include('errors.list')
                                    @endif
                                    <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
                                        <input type="email" class="form-control" name="email" title="E-Mail"
                                               placeholder="E-Mail">
                                    </div>

                                    <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock</i>
										</span>
                                        <input type="password" name="password" id="password" placeholder="Password"
                                               class="form-control"/>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" checked>
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <input type="submit" class="btn btn-simple btn-primary btn-lg" value="Login">
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
    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="{{asset('/js/material.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/material-kit.js')}}" type="text/javascript"></script>
@endsection