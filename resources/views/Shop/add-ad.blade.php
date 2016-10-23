@extends('app')

@section('content')
    <div class="products-grid">
        <header>
            <h3 class="head text-center">Unapproved Advertisements</h3>
        </header>
        @foreach($ads as $key=>$ad)
            <div class="col-md-4 col-sm-6 col-xs-12 product simpleCart_shelfItem text-center">
                <div id="box">
                    <img src="{{asset($ad->banner)}}" alt="{{$ad->title}}" />
                    <a class="product_name" href="#!">{{$ad->title}}</a>
                    <p><a class="item_add" href="#">{{$ad->description}}</a></p>
                    <br><br>
                    <input type="text" id="amount" placeholder="Amount Paid">
                    <br><br>
                    <a href="#!"><i class="glyphicon glyphicon-ok text-success add-remove add" id="{{$ad->id}}" aria-hidden="true" style="font-size: larger"></i>
                        &nbsp;
                        <i class="glyphicon glyphicon-remove text-danger add-remove remove" id="{{$ad->id}}" aria-hidden="true" style="font-size: larger"></i></a>
                </div>
            </div>
            @if(($key+1)%3==0)
                <div class="clearfix"></div>
            @endif
        @endforeach
        <div class="clearfix"></div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/approveAd.js')}}"></script>
@endsection

@section('head')
    <title>Approve Advertisement - E Shoppee</title>
@endsection