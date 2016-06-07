<!-- header-section-starts -->
<div class="header">
    <div class="header-top-strip">
        <div class="container">
            <div class="text-center"><h1><a href="{{url('/')}}" id="titleHeader">Businessway</a></h1>
            </div>
        </div>
    </div>
</div>
@if(\Illuminate\Support\Facades\Auth::check()==false)
    <ul>
        <li><a href="{{url('/auth/login')}}"><span class="glyphicon glyphicon-user"> </span>Login</a></li>
        <li><a href="{{url('/auth/register')}}"><span class="glyphicon glyphicon-lock"> </span>Create an Account</a>
        </li>
    </ul>
@else
    <ul>
        <li><a href="{{url('/auth/logout')}}"><span class="glyphicon glyphicon-log-out"> </span>Logout</a></li>
    </ul>
@endif
<!-- header-section-ends -->
@if(\Illuminate\Support\Facades\Auth::check()==false)
    @include('includes.adminNav')
@elseif(\Illuminate\Support\Facades\Auth::user()->admin)
    @include('includes.adminNav')
@else
    @include('includes.userNav')
@endif