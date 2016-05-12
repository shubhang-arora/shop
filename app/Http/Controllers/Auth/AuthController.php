<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'shop_name'             =>      'required|max:255',
            'user_name'             =>      'required|max:255',
            'email'                 =>      'required|email|max:255|unique:users',
            'location'              =>      'required',
            'city'                      =>   'required',
            'state'                 =>  'required',
            'zipcode'                => 'required',
            'phone'                 =>  'required|min:10|max:10',
            'description'           =>  'required',
            'password'              =>  'required|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data,$premium_shop)
    {

        $users =  User::create([
            'shop_name' => $data['shop_name'],
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'location'  =>  $data['location'],
            'phone'  =>  $data['phone'],
            'zipcode_id'   =>  $data['zipcode'],
            'description'  =>  $data['description'],
            'premium_shop'  => $premium_shop,
            'password' => bcrypt($data['password']),
        ]);
        $this->syncCategories($users, $data['categories']);
        return $users;
    }

    private function syncCategories(User $users , $categories)
    {

        $users->categories()->detach();

        foreach ( $categories as $category ) {
            $newCategories=Category::firstOrCreate([
                'name'          =>      $category,
            ]);

            $users->categories()->attach($newCategories);

        }
    }
}
