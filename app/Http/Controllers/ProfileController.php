<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Auth;

class ProfileController extends Controller
{
  public function show()
  {
    return view('profiles.show');
  }

  public function edit()
  {
    return view('profiles.edit');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'username' => 'unique:users,username,'. Auth::user()->id,
      'name' => 'required',
      'bio' => 'max:500'
    ]);

    $user_id = Auth::user()->id;
    $user = User::find($user_id);
    $user->username = ($request->input('username')) ? strtolower($request->input('username')) : NULL;
    $user->name = $request->input('name');
    $user->title = ($request->input('title')) ? $request->input('title') : NULL;
    $user->location = ($request->input('location')) ? $request->input('location') : NULL;
    $user->bio = ($request->input('bio')) ? $request->input('bio') : NULL;
    $user->save();

    return redirect('/profile');
  }

  public function editPassword()
  {
    return view('profiles.password');
  }

  public function storePassword(Request $request)
  {
    $this->validate($request, [
      'password' => 'required|min:6|confirmed'
    ]);

    $credentials = [
      'email' => Auth::user()->email,
      'password' => $request->input('password_current')
    ];

    if (Auth::validate($credentials)) {
      $user = Auth::user();
      $user->password = bcrypt($request->input('password'));
      $user->save();

      Auth::login($user);

      return redirect('/profile');
    } else {
      return redirect()
        ->back()
        ->withErrors(['password_current' => 'The current password do not match']);
    }
  }
}
