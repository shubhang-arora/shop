<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\City;
use App\Offer;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertiseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin',['only' =>  ['approveAdvertisement','approvedAdvertisement','approveOffer','approvedOffer']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAdvertise()
    {
        return view('Shop.advertise',compact('shops'));
    }

    public function postAdvertise(AdvertiseRequest $request)
    {
        Advertisement::create([
            'user_id'       =>  Auth::user()->id,
            'title'         =>  $request->input('title'),
            'description'   =>  $request->input('description')
        ]);
    }

    public function approveAdvertisement()
    {

    }

    public function approvedAdvertisement()
    {

    }

    public function getOffer()
    {

        $cities = City::lists('name','id');
        return view('Shop.offer',compact('shops','cities'));
    }

    public function postOffer(Request $request)
    {
      $offer =   Offer::create([
            'user_id'       =>  Auth::user()->id,
            'title'         =>  $request->input('title'),
            'description'   =>  $request->input('description'),
            'start_date'    =>  $request->input('start_date'),
            'end_date'    =>  $request->input('end_date'),
            'premium_offer' =>  $request->input('premium_offer')
        ]);
        if($request->input('city_id')==-1)
        {
            $cities = City::all();
            foreach($cities as $city)
            {
                DB::table('city_offer')->create([
                     'city_id'  =>  $city->id,
                    'offer_id'  => $offer->id
                    ]);
            }
        }
        else
        {
            foreach($request->input('city_id') as $city)
            {
                DB::table('city_offer')->create([
                    'city_id'  =>  $city,
                    'offer_id'  => $offer->id
                ]);
            }
        }
    }


    public function approveOffer()
    {

    }

    public function approvedOffer()
    {

    }
    public function getShop()
    {
        $shops = User::latest('created_at')->where('added',0)->get();
        dd($shops);
    }

    public function postShop(Request $request)
    {
        $shop = User::find($request->input('id'));
        $shop = $shop->update([
            'added'  =>  1
        ]);
    }

}
