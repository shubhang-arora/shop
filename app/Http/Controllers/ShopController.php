<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\City;
use App\Offer;
use App\Shop;
use App\State;
use App\User;
use App\Zipcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertiseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpKernel\EventListener\AddRequestFormatsListener;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'search', 'show', 'showOffer', 'offers', 'like', 'cities', 'zipcodes', 'upload', 'diedump']]);
        $this->middleware('isAdmin', ['only' => ['approveAdvertisement', 'approvedAdvertisement', 'getShop', 'postShop', 'manageShop', 'adminDashboard']]);
        $this->middleware('addShop', ['only' => ['create', 'store']]);
        $this->middleware('shouldHaveShop', ['except' => ['index', 'search', 'show', 'create', 'store', 'showOffer', 'offers', 'like', 'cities', 'zipcodes', 'upload', 'diedump']]);
    }

    /**
     * Used for debugging
     */
    public function diedump(Request $request)
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advertisement::where('approved', 1)->where('amount', "!=",0)->orderBy('amount','desc')->get()->take(5);
        $shops = Shop::latest('created_at')->where('added', 1)->where('deleted', 0)->get();
        $categories = Category::lists('name', 'id');
        $cities = City::lists('city_name', 'id');
        return view('Shop.home', compact('shops', 'categories', 'cities','adverts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'name');
        $states = State::lists('state_name', 'id');
        $cities = State::where('state_name',$states->first())->get()->first()->cities->lists('city_name', 'id');
        $zipcodes = City::where('city_name',$cities->first())->get()->first()->zipcodes->lists('code', 'id');
        return view('Shop.register', compact('categories', 'cities', 'states', 'zipcodes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\ShopCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Requests\ShopCreateRequest $request)
    {
        $images = [];
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 5) === 'image') {
                array_push($images, ['link' => $value]);
            }
        }
        $request['images'] = $images;

        $this->validate($request, [
            'images' => 'required'
        ]);

        $user = Auth::user();
        $password = $request->input('password');
        if (Auth::validate(array('user_name' => $user->user_name, 'password' => $password))) {
            $premium_shop = 0;
            if ($request->has('premium_shop')) {
                $premium_shop = 1;
            }
            $shop = Auth::user()->shop()->create([
                'shop_name' => $request->input('shop_name'),
                'description' => $request->input('description'),
                'zipcode_id' => $request->input('zipcode'),
                'location' => $request->input('location'),
                'premium_shop' => $premium_shop,

            ]);
            $this->syncCategories($shop, $request->input('categories'));


            foreach ($images as $key => $image) {
                if ($key == 0) {
                    $image['fav'] = 1;
                }
                $shop->images()->create($image);
            }

            return redirect('/');
        } else {
            return redirect()->back();
        }
    }

    private function syncCategories(Shop $shops, $categories)
    {
        $shops->categories()->detach();
        foreach ($categories as $category) {
            $newCategories = Category::firstOrCreate([
                'name' => $category,
            ]);
            $shops->categories()->attach($newCategories);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $ip_address = request()->ip();
        $liked = DB::table('ip_address')->where('ip', $ip_address)->count() > 0;
        $shop = Shop::findorfail($id);

        if(!(DB::table('views')->where('ip',$ip_address)->count()>0))
        {
            DB::table('views')->insert([
                'ip' =>  $ip_address,
                'shop_id'   =>  $shop->id
            ]);
        }
        return view('Shop.single', compact('shop', 'liked'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getAdvertise()
    {
        return view('Shop.advertise');
    }

    public function postAdvertise(AdvertiseRequest $request)
    {
        $destinationPath = 'uploads'; // upload path
        $extension = Input::file('banner')->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111, 99999) . '.' . $extension; // renaming image
        Input::file('banner')->move($destinationPath, $fileName);

        Advertisement::create([
            'shop_id' => Auth::user()->shop->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'banner' => 'uploads/' . $fileName
        ]);

        return redirect(action('ShopController@show', Auth::user()->shop->id));
    }

    public function approveAdvertisement()
    {
        $ads = Advertisement::where('approved', 0)->where('amount', 0)->get();
        return view('Shop.add-ad', compact('ads'));

    }

    // for admin
    public function approvedAdvertisement(Request $request)
    {

        $ad = Advertisement::find($request->input('id'));

        $add = ($request->input('add') === 'true');
        if ($request->input('type') === 'do') {
            $amount = (float)$request->get('amount');
            if ($add) {
                if ($amount >= 0) {
                    $ad->update(['approved' => 1, 'amount' => $amount]);
                    return 1;
                } else {
                    return json_encode(['error' => 'Amount should be greater than zero']);
                }
            } else {
                $ad->update(['deleted' => 1]);
                return 0;
            }
        } elseif ($request->input('type') === 'undo') {
            if ($add) {
                $ad->update(['approved' => 0, 'amount' => 0]);

                return 1;
            } else {
                $ad->update(['deleted' => 0]);
                return 0;
            }
        }
        return 0;
    }

    public function getOffer()
    {
        return view('Shop.offer');
    }

    public function postOffer(Requests\AddOfferRequest $request)
    {
        $daterange = explode(' - ', $request->input('daterange'));

        $premium_offer = 0;
        if ($request->has('premium_offer')) {
            $premium_offer = 1;
        }
        $offer = Offer::create([
            'shop_id' => Auth::user()->shop->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_date' => $daterange[0],
            'end_date' => $daterange[1],
            'premium_offer' => $premium_offer
        ]);

        return redirect('/offer/' . $offer->id);
    }

    public function showOffer($id)
    {
        $offer = Offer::findorFail($id);

        $active = Carbon::parse($offer->start_date)->lte(Carbon::now());
        $days = Carbon::parse($offer->start_date)->diffForHumans();
        $start = true;
        if ($active) {
            $start = false;
            $active = Carbon::parse($offer->end_date)->gte(Carbon::now());
            $days = Carbon::parse($offer->end_date)->diffForHumans();
        }

        return view('Shop.offerShow', compact('offer', 'active', 'days', 'start'));
    }

    public function offers()
    {
        $offers = Offer::all();
        return view('Shop.allOffers', compact('offers'));
    }

    public function getShop()
    {
        $shops = Shop::latest('created_at')->where('added', 0)->where('deleted', 0)->get();
        return view('Shop.add-shop', compact('shops'));
    }

    public function postShop(Request $request)
    {
        $shop = Shop::find($request->input('id'));
        $add = ($request->input('add') === 'true');
        if ($request->input('type') === 'do') {
            if ($add) {
                $shop->update(['added' => 1]);

                return 1;
            } else {
                $shop->update(['deleted' => 1]);
                return 0;
            }
        } elseif ($request->input('type') === 'undo') {
            if ($add) {
                $shop->update(['added' => 0]);

                return 1;
            } else {
                $shop->update(['deleted' => 0]);
                return 0;
            }
        } elseif ($request->input('type') === 'delete_do') {
            if ($add) {
                $shop->update(['added' => 1, 'deleted' => 0]);
                return 1;
            }
        } elseif ($request->input('type') === 'delete_undo') {
            if ($add) {
                $shop->update(['deleted' => 1]);
                return 1;
            }
        }
        return 0;
    }

    public function sendMail(Request $request)
    {
        $email = User::find($request->get('userID'))->email;
        $message = $request->get('message');

    }

    public function manageShop()
    {
        $shops = Shop::latest('created_at')->where('deleted', 0)->get();
        $title = 'Manage';
        return view('Shop.manage', compact('shops', 'title'));
    }

    public function deletedShops()
    {
        $shops = Shop::latest('created_at')->where('deleted', 1)->get();
        $title = 'Deleted';
        return view('Shop.manage', compact('shops', 'title'));
    }

    public function userDashboard()
    {

    }

    public function adminDashboard()
    {
        return view('Shop.admin');
    }

    public function search(Request $request)
    {
        $search = $request->get('shopName');
        $shops = Shop::where('shop_name', 'like', '%' . $search . '%')->get();
        $categories = collect();
        $cities = collect();
        foreach ($shops as $shop) {
            foreach ($shop->categories as $category) {
                $categories->push($category);
            }

            $cities->push($shop->zipcode->city);
        }
        $categories = $categories->unique('name')->lists('name', 'id');
        $cities = $cities->lists('city_name', 'id');
        return view('Shop.home', compact('shops', 'categories', 'cities'));
    }

    public function like(Request $request)
    {
        $shop = Shop::find($request->input('id'));
        $ip_address = request()->ip();
        $liked = DB::table('ip_address')->where('ip', $ip_address)->count() > 0;
        if ($liked) {
            $shop->unlike(0);
            DB::table('ip_address')->where('ip', $ip_address)->delete();
            return ['count'=>$shop->likeCount];
        } else {
            $shop->like(0);
            DB::table('ip_address')->insert(['ip'=>$ip_address]);
            return ['count'=>$shop->likeCount];
        }

    }

    public function cities(Request $request)
    {
        $id = $request->get('id');
        $state = State::findorfail($id);
        $cities = $state->cities->lists('city_name', 'id');
        if($cities->isEmpty())
            $cities=[-1=>'No Cities'];
        return $cities;
    }

    public function zipcodes(Request $request)
    {
        $id = $request->get('id');
        $city = City::findorfail($id);
        $zipcodes = $city->zipcodes->lists('code', 'id');

        return $zipcodes;
    }

    public function upload(Request $request)
    {
        $destinationPath = 'uploads/'; // upload path
        $extension = $request->file('file')->getClientOriginalExtension(); // getting image extension
        Input::file('file')->move($destinationPath, time() . '_' . $request->file('file')->getClientOriginalName());

        return json_encode([
            'path' => $destinationPath . time() . '_' . $request->file('file')->getClientOriginalName()
        ]);
    }

}
