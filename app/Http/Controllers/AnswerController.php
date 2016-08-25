<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;
use App\Answer;
use App\VoteAnswer;
use App\ReportAnswer;

use Auth;

class AnswerController extends Controller
{
  public function store($slug, Request $request)
  {
    $this->validate($request, ['answer' => 'required']);

    $question = Question::where('slug', '=', $slug)->first();

    if ($question) {
      $answer = new Answer;
      $answer->user_id = Auth::user()->id;
      $answer->question_id = $question->id;
      $answer->answer = $request->input('answer');
      $answer->anonymouse = ($request->input('anonymouse')) ? $request->input('anonymouse') : False;
      $answer->save();
    }

    return redirect()->back();
  }

  public function delete($slug, $id)
  {
    $question = Question::where('slug', '=', $slug)
      ->first();
    $answer = Answer::where('user_id', '=', Auth::user()->id)
      ->where('id', '=', $id)
      ->first();

    if ($question && $answer) {
      $answer->delete();
    }

    return redirect('/'. $slug);
  }

  public function vote($slug, $id)
  {
    $question = Question::where('slug', '=', $slug)->first();
    $answer = Answer::find($id);
    $vote = VoteAnswer::where('user_id', '=', Auth::user()->id)
      ->where('answer_id', '=', $id)
      ->first();

    if ($question && $answer && !$vote) {
      $vote = new VoteAnswer;
      $vote->user_id = Auth::user()->id;
      $vote->answer_id = $id;
      $vote->save();
    }

    return redirect()->back();
  }

  public function report($slug, $id)
  {
    $question = Question::where('slug', '=', $slug)->first();
    $answer = Answer::find($id);
    $vote = ReportAnswer::where('user_id', '=', Auth::user()->id)
      ->where('answer_id', '=', $id)
      ->first();

    if ($question && $answer && !$vote) {
      $vote = new ReportAnswer;
      $vote->user_id = Auth::user()->id;
      $vote->answer_id = $id;
      $vote->save();
    }

    return redirect()->back();
  }
}
