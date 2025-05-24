<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
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

    protected $redirectTo = '/';

    use AuthenticatesUsers {
        logout as performLogout;
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('home');
    }

    protected function authenticated(Request $request, $user)
    {
        \Auth::logoutOtherDevices($request->password);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        \Auth::logoutOtherDevices($request->password);
        $this->middleware('guest')->except('logout');
    }
}
