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
    <a href="{{ route('questions.ask') }}" class="button">Ask a Question</a>
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
    <a href="/{{ $question->slug }}" class="list-highlight-answer">
      <?php $answer = $question->best_answer()->first()->answer; ?>
      <p>
        {{ nl2br(e(str_limit($answer->answer, 330))) }}
      </p>
      @if ($answer->anonymouse)
        <strong>Anonymouse</strong>
      @else
        <strong>Aji Kisworo Mukti</strong>
      @endif
    </a>
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
