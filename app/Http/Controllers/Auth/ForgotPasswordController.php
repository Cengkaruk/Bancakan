<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\PasswordBroker;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(PasswordBroker $broker, Request $request)
    {
        $broker->sendResetLink(['email' => $request->email]);

        return back()->withStatus(trans('passwords.sent'));
    }
}
