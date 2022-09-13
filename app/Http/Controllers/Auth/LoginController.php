<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
//use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    protected function redirectTo()
    {
        if (auth()->check() && auth()->user()->role_id == 1) {
            return $this->redirectTo=route('admin.dashboard');
        } elseif (auth()->check() && auth()->user()->role_id == 2) {
            return $this->redirectTo=route('author.dashboard');
        }
        return '/home';
    }

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
