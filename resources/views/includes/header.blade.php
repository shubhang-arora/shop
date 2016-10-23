<!-- header-section-starts -->
<div class="header">
    <div class="header-top-strip">
        <div class="container">
            <div class="text-center"><h1><a href="{{url('/')}}" id="titleHeader">Semigoogle</a></h1>
            </div>
        </div>
    </div>
</div>
@if(\Illuminate\Support\Facades\Auth::check()==false)
    @include('includes.unauthNav')
@elseif(\Illuminate\Support\Facades\Auth::user()->admin)
    @include('includes.adminNav')
@else
    @include('includes.userNav')
@endif
