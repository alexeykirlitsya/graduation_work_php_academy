<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback($service)
    {
        $serviceUser = Socialite::driver($service)->stateless()->user();
        $existUser = User::where('email', $serviceUser->email)->first();
        if($existUser) {
            Auth::loginUsingId($existUser->id);
        }
        else {
            $user = new User;
            $user->name = $serviceUser->name;
            $user->email = $serviceUser->email;
            $user->service_id = $serviceUser->id;
            $user->service = $service;
            $user->avatar = $serviceUser->avatar;
            $user->save();
            Auth::loginUsingId($user->id);
        }
        return redirect()->route('home');
    }
}
