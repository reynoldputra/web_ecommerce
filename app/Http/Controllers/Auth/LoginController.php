<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo(){
        if(Auth()->user()->role == "user"){
            return route('user.home');
        } else if (Auth()->user()->role == "admin"){
            return route('admin.home');
        }
        // } else if (Auth()->user()->role == "super admin"){
        //     return route('user.home');
        // }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password']))){
            if(Auth()->user()->role == "user"){
                return route('user.index');
            } else if (Auth()->user()->role == "admin"){
                return route('admin.index');
            }   
            // } else if (Auth()->user()->role == "super admin"){
            //     return route('user.home');
            // }
        } else {
            return redirect()->route('login')->with('Error', 'Email or/and password are wrong');
        }
    }
}
