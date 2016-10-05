<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{--

<div class="row header">
    <div class="col-md-2"></div>
    <div class="col-md-8 col-sm-12">
        <div class="col-md-3 col-sm-12">
            <h1 class="display-4"><a href="{{url('/')}}">Businessway</a></h1>
        </div>
        <div class="col-md-4 col-sm-6">
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    {!! Form::open(['action'=>'ShopController@search','method'=>'post','id'=>'searchForm']) !!}
                    <input type="text" class="form-control input-lg" name="shopName" id="search"
                           placeholder="Search Shop" required>
                    {!! Form::close() !!}
                    <span class="input-group-btn">
                            <a class="btn btn-info btn-lg"
                               onclick="if($('[name=shopName]').val()!=''){$('form#searchForm').trigger('submit')}">Search</a>
                        </span>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-6">
                <div class="authen-box">
                    <a href="{{url('auth/login')}}"><span class="btn btn-default btn-lg"><i
                                    class="glyphicon glyphicon-user"></i> Login</span></a>
                    &nbsp;
                    <a href="{{url('auth/register')}}"><span class="btn btn-default btn-lg"><i
                                    class="glyphicon glyphicon-lock"></i> Register</span></a>
                </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="offers">
            <a href="{{url('offers')}}"><span class="btn btn-default btn-lg"><i
                            class="glyphicon glyphicon-gift"></i> Click here for All Offers</span></a>
        </div>
    </div>
</div>
<br>--}}
