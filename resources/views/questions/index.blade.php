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
<div class="row list-question">
  <div class="column">
    <small>Product Design, Development</small>
    <p class="list-question-title"><a href="/what-are-different">What are different options for raising funds to buy an established online business?</a></p>
    <small>12 answers - 13 hours ago</small>
    <a href="#" class="list-highlight-answer">
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
<div class="row list-question">
  <div class="column">
    <small>Product Design, Development</small>
    <p class="list-question-title"><a href="#">What are different options for raising funds to buy an established online business?</a></p>
    <small>12 answers - 13 hours ago</small>
    <a href="#" class="list-highlight-answer">
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
<div class="row pagination">
  <button class="button button-outline">Load more</button>
</div>
@endsection
