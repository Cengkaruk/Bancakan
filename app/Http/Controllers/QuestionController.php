<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;
use App\Topic;
use App\ReportQuestion;
use App\VoteQuestion;

use Auth;

class QuestionController extends Controller
{
  public function index()
  {
    $questions = Question::orderBy('created_at', 'DESC')->simplePaginate(15);

    return view('questions.index')
      ->with('questions', $questions);
  }

  public function show($slug)
  {
    $question = Question::where('slug', '=', $slug)->first();

    return view('questions.show')
      ->with('question', $question);
  }

  public function ask()
  {
    return view('questions.ask');
  }

  public function storeAsk(Request $request)
  {
    $this->validate($request, [
      'question' => 'required',
      'topics' => 'required'
    ]);

    $question = new Question;
    $question->user_id = Auth::user()->id;
    $question->slug = $this->createSlug($request->input('question'));
    $question->question = $request->input('question');
    $question->detail = $request->input('detail');
    $question->anonymouse = ($request->input('anonymouse')) ? $request->input('anonymouse') : False;
    $question->save();

    $topics = [];
    foreach ($request->input('topics') as $input_topic) {
      $topic = Topic::where('topic', '=', $input_topic)->first();
      if (!$topic) {
        $topic = new Topic;
        $topic->topic = $input_topic;
        $topic->save();
      }
      array_push($topics, $topic);
    }

    $question->topics()->saveMany($topics);

    return redirect(route('questions.show', $question->slug));
  }

  public function report($slug)
  {
    $question = Question::where('slug', '=', $slug)->first();
    $report = ReportQuestion::where('user_id', '=', Auth::user()->id)
      ->where('question_id', '=', $question->id)
      ->first();

    if ($question && !$report) {
      $report = new ReportQuestion;
      $report->user_id = Auth::user()->id;
      $report->question_id = $question->id;
      $report->save();
    }

    return redirect()->back();
  }

  public function vote($slug)
  {
    $question = Question::where('slug', '=', $slug)->first();
    $vote = VoteQuestion::where('user_id', '=', Auth::user()->id)
      ->where('question_id', '=', $question->id)
      ->first();

    if ($question && !$vote) {
      $vote = new VoteQuestion;
      $vote->user_id = Auth::user()->id;
      $vote->question_id = $question->id;
      $vote->save();
    }

    return redirect()->back();
  }

  public function delete($slug)
  {
    $question = Question::where('slug', '=', $slug)
      ->where('user_id', '=', Auth::user()->id)
      ->first();

    if ($question) {
      $question->delete();
    }

    return redirect('/');
  }

  /* Slug Thing */
  public function createSlug($title, $id = 0)
  {
    // Normalize the title
    $slug = str_slug($title);
    // Get any that could possibly be related.
    // This cuts the queries down by doing it once.
    $allSlugs = $this->getRelatedSlugs($slug, $id);
    // If we haven't used it before then we are all good.
    if (! $allSlugs->contains('slug', $slug)){
      return $slug;
    }
    // Just append numbers like a savage until we find not used.
    for ($i = 1; $i <= 10; $i++) {
      $newSlug = $slug.'-'.$i;
      if (! $allSlugs->contains('slug', $newSlug)) {
        return $newSlug;
      }
    }
    throw new \Exception('Can not create a unique slug');
  }
  protected function getRelatedSlugs($slug, $id = 0)
  {
    return Question::select('slug')->where('slug', 'like', $slug.'%')
    ->where('id', '<>', $id)
    ->get();
  }
}
