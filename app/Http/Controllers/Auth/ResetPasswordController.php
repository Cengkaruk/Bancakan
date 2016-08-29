<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\PasswordBroker;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm($token)
    {
        return view('auth.passwords.reset')->withToken($token);
    }

    public function reset(PasswordBroker $broker, Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $email = $request->only('email');
        $token = $request->token;

        if ($user = $broker->getUser($email)) {
            if ($broker->tokenExists($user, $token)) {
                $user->password = bcrypt($request->password);
                $user->save();
                $broker->deleteToken($token);

                return redirect('/login')->withStatus(trans('passwords.reset'));
            }
        }

        return back()->withInput()->withErrors(trans('passwords.token'));
    }
}
