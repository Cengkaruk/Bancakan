@extends('layout')

@section('content')
<div class="row">
  <div class="column column-50">
    <h4>Ask a Question</h4>
    <form>
      <fieldset>
        <label>Question</label>
        <textarea placeholder="Enter your question"></textarea>
        <label>Details</label>
        <textarea placeholder="Provide more details"></textarea>
        <label>Topics</label>
        <input type="text" placeholder="Choose topics">
        <input class="button-primary" value="Ask your Question" type="submit">
        <div class="float-right">
          <input id="anonymouse" type="checkbox">
          <label class="label-inline" for="anonymouse">Anonymouse</label>
        </div>
      </fieldset>
    </form>
  </div>
  <div class="column column-40 column-offset-10">
    <h4>Tips</h4>
    <ul>
      <li>Ask a specific question.</li>
      <li>Be brief and to the point.</li>
      <li>Stay focused on a single topic.</li>
      <li>You can hide your identity using Anonymouse feature.</li>
    </ul>
  </div>
</div>
<hr class="separator">
@endsection
