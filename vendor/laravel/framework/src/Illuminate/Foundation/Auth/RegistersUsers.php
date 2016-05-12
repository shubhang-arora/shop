<?php

namespace Illuminate\Foundation\Auth;

use App\Category;
use App\City;
use App\State;
use App\Zipcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        $categories = Category::lists('name','id');
        $cities = City::lists('name','id');
        $states = State::lists('name','id');
        $zipcodes = Zipcode::lists('code','id');
        return view('auth.register',compact('categories','cities','states','zipcodes'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        if($request->has('premium_shop'))
        {
            Auth::login($this->create($request->all(),1));
        }
        else
        {
            Auth::login($this->create($request->all(),0));
        }


        return redirect($this->redirectPath());
    }
}
