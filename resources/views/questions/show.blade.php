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
            <a href="{{ (Auth::check()) ? route('questions.vote', $question->slug) : '#' }}">Upvote ({{ $question->votes->count() }})</a> -
            <a href="#">Share</a> -
            <a href="{{ (Auth::check()) ? route('questions.report', $question->slug) : '#' }}">Report</a>
          </small>
        </p>
      </div>
    </div>
  </div>
</div>
<br>
@if (Auth::check())
<div id="answer-box" class="row" style="display: none">
  <div class="column column-67 column-offset-10">
    <form method="POST" action="{{ route('answers.store', $question->slug) }}" style="margin-bottom: 0">
      {{ csrf_field() }}
      <fieldset>
        <textarea name="answer" rows="8" cols="40" required>{{ old('answer') }}</textarea>
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
@endif
<hr class="separator">
@if (Auth::check())
@foreach ($question->answers as $answer)
<div class="row list-answers">
  <div class="column answer">
    <div class="author">
      @if ($answer->anonymouse)
        <strong>Anonymouse</strong>
      @else
        <a href="{{ route('profiles.show.others', ($answer->user->username) ? $answer->user->username : $answer->user->id) }}">
          <strong>{{ $answer->user->name }}</strong>
        </a>
        @if ($answer->user->title)
           - <i><small>{{ $answer->user->title }}</small></i>
        @endif
      @endif
    </div>
    <p>
      {!! nl2br(e($answer->answer)) !!}
    </p>
    <div class="actions">
      <small>
        @if (Auth::check())
        @if ($answer->user_id == Auth::user()->id)
        <a href="{{ route('answers.delete', [$question->slug, $answer->id]) }}">Delete</a> -
        @endif
        @endif
        <a href="#" class="show-reply-answer-box">Reply</a> -
        <a href="{{ (Auth::check()) ? route('answers.vote', [$question->slug, $answer->id]) : '#' }}">Upvote ({{ $answer->votes->count() }})</a> -
        <a href="{{ (Auth::check()) ? route('answers.report', [$question->slug, $answer->id]) : '#' }}">Report</a>
      </small>
    </div>
    <div class="list-reply">
      @if (Auth::check())
      <div class="row reply-answer-box" style="display: none">
        <div class="column column-67">
          <form method="POST" action="{{ route('answers.reply', [$question->slug, $answer->id]) }}" style="margin-bottom: 0">
            {{ csrf_field() }}
            <fieldset>
              <textarea name="reply" rows="8" cols="40"></textarea>
              <button type="submit" class="button">Reply</button>
              <div class="float-right">
                <input name="anonymouse" id="anonymouse" type="checkbox">
                <label class="label-inline" for="anonymouse">Anonymouse</label>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      @endif
      @foreach ($answer->replies as $reply)
      <div class="reply">
        <div class="row">
          <div class="column">
            <div class="author">
              @if ($reply->anonymouse)
                <strong>Anonymouse</strong>
              @else
                <a href="{{ route('profiles.show.others', ($reply->user->username) ? $reply->user->username : $reply->user->id) }}">
                  <strong>{{ $reply->user->name }}</strong>
                </a>
                @if ($reply->user->title)
                   - <i><small>{{ $reply->user->title }}</small></i>
                @endif
              @endif
            </div>
            @if ($reply->reply_id)
              <?php $reply_of_reply = $reply->getReply($reply->reply_id) ?>
              @if ($reply_of_reply->anonymouse)
                <div class="reply-of-reply">
                  <i class="fa fa-reply"></i><i> Anonymouse</i>
                </div>
              @else
              <div class="reply-of-reply">
                <i class="fa fa-reply"></i><i> {{ $reply->getReplyAuthor($reply->reply_id)->name }}</i>
              </div>
              @endif
            @endif
            {!! nl2br(e($reply->reply)) !!}
            <div class="actions">
              <small>
                @if (Auth::check())
                @if ($reply->user_id == Auth::user()->id)
                <a href="{{ (Auth::check()) ? route('replies.delete', [$question->slug, $answer->id, $reply->id]) : '#' }}">Delete</a> -
                @endif
                @endif
                <a href="#" class="show-reply-reply-box">Reply</a> -
                <a href="{{ (Auth::check()) ? route('replies.report', [$question->slug, $answer->id, $reply->id]) : '#' }}">Report</a>
              </small>
            </div>
          </div>
        </div>
        @if (Auth::check())
        <div class="row reply-reply-box" style="display: none">
          <div class="column column-67">
            <form method="POST" action="{{ route('replies.reply', [$question->slug, $answer->id, $reply->id]) }}" style="margin-bottom: 0">
              {{ csrf_field() }}
              <fieldset>
                <textarea name="reply" rows="8" cols="40"></textarea>
                <button type="submit" class="button">Reply</button>
                <div class="float-right">
                  <input name="anonymouse" id="anonymouse" type="checkbox">
                  <label class="label-inline" for="anonymouse">Anonymouse</label>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</div>
@endforeach
@else
<p>Login to see the answers</p>
@endif
@endsection

@section('javascript')
<script type="text/javascript" src="{{ elixir('js/all.js') }}"></script>
@endsection
