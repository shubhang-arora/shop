<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\City;
use App\Offer;
use App\Shop;
use App\State;
use App\User;
use App\Zipcode;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertiseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\EventListener\AddRequestFormatsListener;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin',['only' =>  ['approveAdvertisement','approvedAdvertisement','getShop','postShop']]);
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
        $categories = Category::lists('name','name');
        $cities = City::lists('city_name','id');
        $states = State::lists('state_name','id');
        $zipcodes = Zipcode::lists('code','id');
        return view('Shop.register',compact('categories','cities','states','zipcodes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ShopCreateRequest $request)
    {
        $user = Auth::user();
        $password = $request->input('password');
        if(Auth::validate(array('user_name' => $user->user_name, 'password' => $password)))
        {
            $premium_shop = 0;
            if($request->has('premium_shop'))
            {
                $premium_shop = 1;
            }
            $shop = Auth::user()->shop()->create([
                'shop_name'  =>  $request->input('shop_name'),
                'description'  =>  $request->input('description'),
                'zipcode_id'    =>  $request->input('zipcode'),
                'location'  =>  $request->input('location'),
                'premium_shop'  =>  $premium_shop,

            ]);

            return redirect('/');
        }
        else
        {
            return redirect()->back();
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(User::findorFail($id));
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
            'description'   =>  $request->input('description'),
            'money'         =>  0
        ]);
    }

    public function approveAdvertisement()
    {
        $add = Advertisement::where('approved',0)->where('paid',0)->get();
        dd($add);
    }

    public function approvedAdvertisement(Request $request)
    {
        $add = Advertisement::findorfail($request->input('id'));
        if($request->input('flag'))
        {
            if($request->input('money')<=0)
            {
                //send error(money can not be 0 or negative)
            }
            else
            {
                $add->update([
                   'money'  =>  $request->input('money'),
                    'approved'  =>  1
                ]);
            }
        }
        else
        {
            $add->update([
               'approved'   =>  0
            ]);
        }
    }

    public function getOffer()
    {
        $cities = City::lists('name','id');
        return view('Shop.offer',compact('shops','cities'));
    }

    public function postOffer(Request $request)
    {
      $offer =   Offer::create([
            'shop_id'       =>  Auth::user()->shop()->id,
            'title'         =>  $request->input('title'),
            'description'   =>  $request->input('description'),
            'start_date'    =>  $request->input('start_date'),
            'end_date'    =>  $request->input('end_date'),
            'premium_offer' =>  $request->input('premium_offer')
        ]);
       
    }



    public function getShop()
    {
        $shops = Shop::latest('created_at')->where('added',0)->where('deleted',0)->get();
        return view('Shop.add-shop',compact('shops'));
    }

    public function postShop(Request $request)
    {
        $shop = Shop::find($request->input('id'));
        $shop = $shop->update([
            'added'  =>  1
        ]);
    }

}
