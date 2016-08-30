<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class NotifController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return view('notifications.index');
	}

	public function read($id)
	{
		Auth::user()->notifications()->whereId($id)->firstOrFail()->markAsRead();

		return back();
	}

	public function readAll()
	{
		Auth::user()->unreadNotifications->markAsRead();

		return back();
	}
}
