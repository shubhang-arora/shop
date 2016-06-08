@extends('app')

@section('content')
    <br><br>
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2">
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
                    <p class="text-right">Shop Name : <strong>{{$offer->shop->shop_name}}</strong></p>
                    <p class="text-right">Owner : <strong>{{$offer->shop->user->user_name}}</strong></p>
                </div>
                <div class="panel-footer">@if($active==false&&$start==false)
                        Expired {{$days}} @elseif($active==false&&$start==true)
                        Starting {{$days}} @elseif($active==true&&$start==false) Expiring {{$days}} @endif</div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
@section('head')
    <title>{{$offer->title}} Offer - Businessway</title>
@endsection
