<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class QuestionController extends Controller
{
  public function index()
  {
    return view('questions.index');
  }

  public function show()
  {
    return view('questions.show');
  }

  public function ask()
  {
    return view('questions.ask');
  }
}
