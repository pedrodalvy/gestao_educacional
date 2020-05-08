<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(), 'password');
        $usernameKey = $this->usernameKey();

        $data['userable_type'] = Admin::class;
        $data[$usernameKey] = $data[$this->username()];
        unset($data[$this->username()]);

        return $data;
    }

    /**
     * Check if the login is with email or enrolment
     *
     * @return string
     */
    protected function usernameKey()
    {
        $email = \Request::get($this->username());

        $validator = \Validator::make([
            'email' => $email
        ], [
            'email' => 'email'
        ]);

        return $validator->fails() ? 'enrolment' : 'email';
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }
}
