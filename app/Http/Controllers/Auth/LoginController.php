<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Alert;

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

    /*protected function redirectTo()
    {
        if (Auth()->user()->roles == 'Admin') {
            Alert::success('Login Berhasil');
            return route('dashboard');
        } else if (Auth()->user()->roles == 'Pengasuh'){
            Alert::success('Login Berhasil');
            return route('pengasuh');
        }else{
            Alert::success('Login Berhasil');
            return route('donatur');
        }
    }*/
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        if(auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password']))){
            if(auth()->user()->roles == 'Admin'){
                Alert::success('Selamat Datang', 'Login Berhasil');
                return redirect()->route('dashboard');
            }else if(auth()->user()->roles == 'Pengasuh'){ 
                Alert::success('Selamat Datang', 'Login Berhasil');
                return redirect()->route('pengasuh');
            }else{
                Alert::success('Selamat Datang', 'Login Berhasil');
                return redirect()->route('donatur');
            }
        }else{
            Alert::error('Oops!', 'Login Gagal');
            return redirect()->route('login');
        }
    }
}
