<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NotifController extends Controller
{
  public function index()
  {
    return view('notifications.index');
  }
}
