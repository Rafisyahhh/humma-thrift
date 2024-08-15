<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller {
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
    public function __construct() {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user) {
        $user->update([
            'last_login' => Carbon::now()
        ]);

        if ($user->hasRole('admin')) {
            return redirect()->intended('/admin');
        }

        if ($user->hasRole('user')) {
            if ($user->store) {
                return redirect()->intended('/seller/home');
            }
            return redirect()->intended('/');
        }
        return redirect()->intended('/');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request) {
        return collect($request->only($this->username(), 'password'))->put('banned', 0)->toArray();
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request) {
        if (Auth::check()) {
            Cache::forget('user-is-online-' . Auth::id());
        }
    }

    public function login(Request $request) {
        // Validasi reCAPTCHA
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'g-recaptcha-response' => 'recaptcha',
        ]);

        if (Auth::attempt($this->credentials($request))) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
}