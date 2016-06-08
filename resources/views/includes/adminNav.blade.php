<div class="inner-banner">
    <div class="container">
        <div class="banner-top inner-head">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo">
                        <a href="{{url('/')}}"><img src="{{asset('logo.png')}}" class="img-responsive" alt="Logo"></a>
                    </div>
                </div>
                <!--/.navbar-header-->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="{{url('/admin-panel')}}">Admin Panel</a></li>

                        <li><a href="{{url('/auth/logout')}}"><span class="glyphicon glyphicon-log-out"> </span>&nbsp;Logout</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
    </div>
</div>