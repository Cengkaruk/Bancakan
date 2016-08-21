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
    <small>12 answers - {{ $question->created_at->diffForHumans() }}</small>
    <a href="/{{ $question->slug }}" class="list-highlight-answer">
      <p>
        Hi there,
        The options are the same as buying many traditional businesses.
        You can obviously use your own funds, raise funds from friends and family, use personal lines of credit, crowdfunding/investment or seek personal loans from financial institutions.
        Any wise investor i…
      </p>
      <strong>Aji Kisworo Mukti</strong>
    </a>
  </div>
</div>
@endforeach
<div class="row pagination">
  <button class="button button-outline">Load more</button>
</div>
@endsection
