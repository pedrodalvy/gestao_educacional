<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * @param Request $request
     * @return array|JsonResponse
     * @throws ValidationException
     */
    public function accessToken(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        if ($token = \Auth::guard('api')->attempt($credentials)) {
            return ['token' => $token];
        }

        return response()->json([
            'error' => \Lang::get('auth.failed')
        ], 400);
    }

    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(), 'password');
        $usernameKey = $this->usernameKey();

        $data[$usernameKey] = $data[$this->username()];
        unset($data[$this->username()]);

        return $data;
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
}
