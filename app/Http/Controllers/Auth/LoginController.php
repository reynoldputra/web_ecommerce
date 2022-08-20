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
<<<<<<< HEAD
        if(Auth()->user()->role==2){
            return route('user.index');
=======
        if(Auth()->user()->role == "user"){
            return route('user.home');
        } else if (Auth()->user()->role == "admin"){
            return route('product.product.index');
>>>>>>> 812f57f31f368f39563f40cd21d385e45aaee599
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
<<<<<<< HEAD
            if(auth()->user()->role==2){
                return redirect()->route('user.index');
            }
        }else{
            return redirect()->route('login')->with('Error', 'Email and password are wrong');
=======
            if(Auth()->user()->role == "user"){
                return route('user.index');
            } else if (Auth()->user()->role == "admin"){
                return route('product.product.index');
            }   
        } else {
            return redirect()->route('login')->with('Error', 'Email or/and password are wrong');
>>>>>>> 812f57f31f368f39563f40cd21d385e45aaee599
        }
    }
}
