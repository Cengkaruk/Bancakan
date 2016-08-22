@extends('layout')
@section('content')
<div class="row">
  <div class="column column-50">
    <h4>Startup advice from the community</h4>
  </div>
  <div class="column column-33">
    <form action="">
      <input placeholder="Search" type="text">
    </form>
  </div>
  <div class="column">
    <a href="{{ (Auth::check()) ? route('questions.ask') : url('/register') }}" class="button">Ask a Question</a>
  </div>
</div>
<hr class="separator">
@foreach($questions as $question)
<div class="row list-question">
  <div class="column">
    <small>
      <?php
        $topics = [];
        foreach ($question->topics as $topic) {
          array_push($topics, $topic->topic);
        }
        echo implode(', ', $topics);
      ?>
    </small>
    <p class="list-question-title"><a href="/{{ $question->slug }}">{{ $question->question }}</a></p>
    <small>{{ $question->answers->count() }} answers - {{ $question->created_at->diffForHumans() }}</small>
    @if ($question->answers->count() > 0)
      <?php $answer = $question->best_answer(); ?>
      @if (count($answer) > 0)
      <a href="/{{ $question->slug }}" class="list-highlight-answer">
        <?php $answer = $answer->first()->answer ?>
        <p>
          {!! nl2br(e(str_limit($answer->answer, 330))) !!}
        </p>
        @if ($answer->anonymouse)
          <strong>Anonymouse</strong>
        @else
          <strong>{{ $answer->user->name }}</strong>
        @endif
      </a>
      @else
      <a href="/{{ $question->slug }}" class="list-highlight-answer">
        <?php $answer = $question->answers->first() ?>
        <p>
          {!! nl2br(e(str_limit($answer->answer, 330))) !!}
        </p>
        @if ($answer->anonymouse)
          <strong>Anonymouse</strong>
        @else
          <strong>{{ $answer->user->name }}</strong>
        @endif
      </a>
      @endif
    @endif
  </div>
</div>
@endforeach
<div class="row pagination">
  <a href="{{ $questions->previousPageUrl() }}" class="button button-outline"><i class="fa fa-chevron-left"></i></a>
  &nbsp;
  <a href="{{ $questions->nextPageUrl() }}" class="button button-outline">Previous</a>
</div>
@endsection
