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
          <small>12 answers - {{ $question->created_at->diffForHumans() }}</small><br>
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
<div class="row">
  <div class="column column-offset-10">
    <a href="#" class="button">Answer</a>
  </div>
</div>
<hr class="separator">
<div class="row list-answers">
  <div class="column answer">
    <div class="author">
      <a href="#"><strong>Aji Kisworo Mukti</strong></a> - <i>Co founder at Sepetak and Pilamo</i>
    </div>
    <p>
      Hi there,

      The options are the same as buying many traditional businesses.
    </p>
    <p>
      You can obviously use your own funds, raise funds from friends and family, use personal lines of credit, crowdfunding/investment or seek personal loans from financial institutions.
    </p>
    <p>
      Any wise investor in your venture should require -- and you should have prepared -- financials for the online business you are purchasing. Does the online brand have tangible assets? Inventory? Existing sales/AR? What about long-term purchase orders or contracts?
    </p>
    <p>
      Where I see most entrepreneurs stumble is buying too much into "blue sky" value, that is, believing the sellers opinion of what future value the brand/company may have. You have to take that into consideration, but it should not be "the" deciding factor. If the business is truly a cash cow, as many buyers would want you to believe, why are they selling it? Do you see opportunity for growth? What skill set or leverage do you have that will accelerate that growth or expand the market of your acquisition?

      Again, funding options are generally the same between traditional businesses and online businesses. Investors/lenders will require the same due diligence and financials to establish an assess the level of risk.

      All the best
    </p>
    <div class="actions">
      <small><a href="#">Reply</a> - <a href="#">Upvote (23)</a> - <a href="#">Share</a> - <a href="#">Report</a></small>
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
            <small><a href="#">Reply</a> - <a href="#">Upvote</a> - <a href="#">Share</a> - <a href="#">Report</a></small>
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
            <small><a href="#">Reply</a> - <a href="#">Upvote (2)</a> - <a href="#">Share</a> - <a href="#">Report</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
