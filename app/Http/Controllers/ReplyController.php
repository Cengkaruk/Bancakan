<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;
use App\Answer;
use App\Reply;
use App\ReportReply;
use App\Notifications\ReplyNotification;

use Auth;

class ReplyController extends Controller
{
  public function reply($slug, $id, Request $request)
  {
    $this->validate($request, ['reply' => 'required']);

    $question = Question::where('slug', '=', $slug)->first();
    $answer = Answer::find($id);

    if ($question && $answer) {
      $reply = new Reply;
      $reply->user_id = Auth::user()->id;
      $reply->answer_id = $answer->id;
      $reply->reply = $request->input('reply');
      $reply->anonymouse = ($request->input('anonymouse')) ? $request->input('anonymouse') : False;
      $reply->save();

      $reply = $reply->fresh('user', 'answer.question');

      if ($reply->user_id != $reply->answer->user_id) {
        $answer->user->notify(new ReplyNotification($reply));
      }
    }

    return redirect()->back();
  }

  public function delete($slug, $answer_id, $reply_id)
  {
    $question = Question::where('slug', '=', $slug)
      ->first();
    $reply = Reply::where('user_id', '=', Auth::user()->id)
      ->where('id', '=', $reply_id)
      ->first();

    if ($question && $reply) {
      $reply->delete();
    }

    return redirect('/'. $slug);
  }

  public function report($slug, $answer_id, $reply_id)
  {
    $question = Question::where('slug', '=', $slug)->first();
    $reply = Reply::find($reply_id);
    $vote = ReportReply::where('user_id', '=', Auth::user()->id)
      ->where('reply_id', '=', $reply_id)
      ->first();

    if ($question && $reply && !$vote) {
      $vote = new ReportReply;
      $vote->user_id = Auth::user()->id;
      $vote->reply_id = $reply->id;
      $vote->save();
    }

    return redirect()->back();
  }

  public function replyToReply($slug, $answer_id, $reply_id, Request $request)
  {
    $this->validate($request, ['reply' => 'required']);

    $question = Question::where('slug', '=', $slug)->first();
    $reply = Reply::find($reply_id);

    if ($question && $reply) {
      $reply = new Reply;
      $reply->user_id = Auth::user()->id;
      $reply->answer_id = $answer_id;
      $reply->reply_id = $reply_id;
      $reply->reply = $request->input('reply');
      $reply->anonymouse = ($request->input('anonymouse')) ? $request->input('anonymouse') : False;
      $reply->save();

      $reply = $reply->fresh('user', 'replied.user', 'replied.answer.question');

      if ($reply->user_id != $reply->replied->user_id) {
        $reply->replied->user->notify(new ReplyNotification($reply));
      }
    }

    return redirect()->back();
  }
}
