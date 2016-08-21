@extends('layout')

@section('content')
<div class="row single-question">
  <div class="column column-10">
    <a href="{{ URL::previous() }}">
      <i class="fa fa-2x fa-chevron-left"></i>
    </a>
  </div>
  <div class="column">
    <h4>{{ $question->question }}</h4>
    <div class="row">
      <div class="column column-67">
        {!! ($question->detail) ? nl2br(e($question->detail)) : 'Pertanyaan ini tidak menyertakan detail.' !!}
      </div>
      <div class="column column-34">
        <p>
          <?php
          $topics = [];
          foreach ($question->topics as $topic) {
            array_push($topics, $topic->topic);
          }
          echo implode(', ', $topics);
          ?>
          <br>
          <small>{{ $question->answers->count() }} answers - {{ $question->created_at->diffForHumans() }}</small><br>
          @if ($question->anonymouse)
          <strong>Anonymouse</strong>
          @else
          <a href="{{ route('profiles.show.others', ($question->user->username) ? $question->user->username : $question->user->id) }}">
            <strong>{{ $question->user->name }}</strong>
          </a>
          @endif
          <br>
          <small>
            @if (Auth::check())
            @if ($question->user_id == Auth::user()->id)
            <a href="{{ route('questions.delete', $question->slug) }}">Delete</a> -
            @endif
            @endif
            <a href="{{ route('questions.vote', $question->slug) }}">Upvote ({{ $question->votes->count() }})</a> - <a href="#">Share</a> - <a href="{{ route('questions.report', $question->slug) }}">Report ({{ $question->reports->count() }})</a>
          </small>
        </p>
      </div>
    </div>
  </div>
</div>
<br>
<div id="answer-box" class="row" style="display: none">
  <div class="column column-67 column-offset-10">
    <form method="POST" action="{{ route('answers.store', $question->slug) }}" style="margin-bottom: 0">
      {{ csrf_field() }}
      <fieldset>
        <textarea name="answer" rows="8" cols="40"></textarea>
        <button type="submit" class="button">Answer</button>
        <div class="float-right">
          <input name="anonymouse" id="anonymouse" type="checkbox">
          <label class="label-inline" for="anonymouse">Anonymouse</label>
        </div>
      </fieldset>
    </form>
  </div>
</div>
<div class="row">
  <div class="column column-offset-10">
    <button id="show-answer-box" class="button">Answer</button>
  </div>
</div>
<hr class="separator">

@foreach ($question->answers as $answer)
<div class="row list-answers">
  <div class="column answer">
    <div class="author">
      @if ($answer->anonymouse)
        <strong>Anonymouse</strong>
      @else
        <a href="{{ route('profiles.show.others', ($question->user->username) ? $question->user->username : $question->user->id) }}">
          <strong>{{ $answer->user->name }}</strong>
        </a>
        @if ($answer->user->title)
           - <i>{{ $answer->user->title }}</i>
        @endif
      @endif
    </div>
    <p>
      {{ nl2br(e($answer->answer)) }}
    </p>
    <div class="actions">
      <small>
        @if (Auth::check())
        @if ($answer->user_id == Auth::user()->id)
        <a href="{{ route('answers.delete', [$question->slug, $answer->id]) }}">Delete</a> -
        @endif
        @endif
        <a href="#">Reply</a> -
        <a href="{{ route('answers.vote', [$question->slug, $answer->id]) }}">Upvote ({{ $answer->votes->count() }})</a> -
        <a href="{{ route('answers.report', [$question->slug, $answer->id]) }}">Report ({{ $answer->reports->count() }})</a>
      </small>
    </div>
    <div class="list-reply">
      <div class="row">
        <div class="column">
          <div class="author">
            <a href="#"><strong>Aji Kisworo Mukti</strong></a> - <i>Co founder at Sepetak and Pilamo</i>
          </div>
          <p>
            You can obviously use your own funds, raise funds from friends and family, use personal lines of credit, crowdfunding/investment or seek personal loans from financial institutions.
          </p>
          <div class="actions">
            <small><a href="#">Reply</a> - <a href="#">Upvote ()</a> - <a href="#">Report</a></small>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
          <div class="author">
            <a href="#"><strong>Joko</strong></a> - <i>Developer Handal</i>
          </div>
          <p>
            <div class="reply-of-reply">
              <i class="fa fa-reply"></i> <i>Aji Kisworo Mukti</i>
            </div>
            You can obviously use your own funds, raise funds from friends and family, use personal lines of credit, crowdfunding/investment or seek personal loans from financial institutions.
          </p>
          <div class="actions">
            <small><a href="#">Reply</a> - <a href="#">Upvote (2)</a> - <a href="#">Report</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection

@section('javascript')
<script type="text/javascript" src="{{ elixir('js/all.js') }}"></script>
@endsection
