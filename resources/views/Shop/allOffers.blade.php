@extends('app')

@section('content')
    <div class="container">
        @foreach($offers as $offer)
            {{--*/
                $active = Carbon\Carbon::parse($offer->start_date)->lte(Carbon\Carbon::now());
        $days = Carbon\Carbon::parse($offer->start_date)->diffForHumans();
        $start = true;
        if ($active){
            $start=false;
            $active=Carbon\Carbon::parse($offer->end_date)->gte(Carbon\Carbon::now());
            $days = Carbon\Carbon::parse($offer->end_date)->diffForHumans();
        }
            /*--}}
            <div class="col-sm-4">
                <div class="panel @if($active) panel-default @else panel-danger @endif ">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title">{{$offer->title}} @if($offer->premium_offer)<span
                                    class="glyphicon glyphicon-ok-circle"
                                    data-toggle="tooltip" data-placement="bottom"
                                    title="Premium Offer"></span>@endif</h3>
                    </div>
                    <div class="panel-body">
                        <p class="lead">
                            {{$offer->description}}
                        </p>
                        <a href="{{action('ShopController@show',[$offer->shop->id])}}">
                            <p class="text-right">Shop Name : <strong>{{$offer->shop->shop_name}}</strong></p>
                            <p class="text-right">Owner : <strong>{{$offer->shop->user->user_name}}</strong></p>
                        </a>
                    </div>
                    <div class="panel-footer">@if($active==false&&$start==false)
                            Expired {{$days}} @elseif($active==false&&$start==true)
                            Starting {{$days}} @elseif($active==true&&$start==false) Expiring {{$days}} @endif</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('head')
    <title>All Offers - Businessway</title>
@endsection