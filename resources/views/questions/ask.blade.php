@extends('layout')

@section('content')
<div class="row">
  <div class="column column-50">
    <h4>Ask a Question</h4>
    @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    @endif
    <form method="POST" action="{{ route('questions.ask.store') }}">
      {{ csrf_field() }}
      <fieldset>
        <label>Question</label>
        <textarea name="question" placeholder="Enter your question">{{ old('question') }}</textarea>
        <label>Details</label>
        <textarea name="detail" placeholder="Provide more details" rows="10" style="height: inherit">{{ old('detail') }}</textarea>
        <label>Topics</label>
        <select name="topics[]" multiple="multiple">
          <option value="Advertising">Advertising</option>
          <option value="Bootstrapping">Bootstrapping</option>
          <option value="Branding">Branding</option>
          <option value="Business Development">Business Development</option>
          <option value="Cloud">Cloud</option>
          <option value="Coaching">Coaching</option>
          <option value="Copywriting">Copywriting</option>
          <option value="CRM">CRM</option>
          <option value="Crowdfunding">Crowdfunding</option>
          <option value="Customer Engagement">Customer Engagement</option>
          <option value="E-commerce">E-commerce</option>
          <option value="Education">Education</option>
          <option value="Email Marketing">Email Marketing</option>
          <option value="Entrepreneurship">Entrepreneurship</option>
          <option value="Finance">Finance</option>
          <option value="Financial Consulting">Financial Consulting</option>
          <option value="Getting Started">Getting Started</option>
          <option value="Growth Strategy">Growth Strategy</option>
          <option value="Human Resources">Human Resources</option>
          <option value="Identity">Identity</option>
          <option value="Inbound Marketing">Inbound Marketing</option>
          <option value="Innovation">Innovation</option>
          <option value="Leadership">Leadership</option>
          <option value="Lean Startup">Lean Startup</option>
          <option value="Legal">Legal</option>
          <option value="Marketplaces">Marketplaces</option>
          <option value="Metrics & Analytics">Metrics & Analytics</option>
          <option value="Mobile">Mobile</option>
          <option value="Nonprofit">Nonprofit</option>
          <option value="Product Management">Product Management</option>
          <option value="Productivity">Productivity</option>
          <option value="Public Relations">Public Relations</option>
          <option value="Public Speaking">Public Speaking</option>
          <option value="Publishing">Publishing</option>
          <option value="Real Estate">Real Estate</option>
          <option value="Restaurant & Retail">Restaurant & Retail</option>
          <option value="SaaS">SaaS</option>
          <option value="Sales & Lead Generation">Sales & Lead Generation</option>
          <option value="Search Engine Marketing">Search Engine Marketing</option>
          <option value="Search Engine Optimization">Search Engine Optimization</option>
          <option value="Sectors">Sectors</option>
          <option value="Social Media Marketing">Social Media Marketing</option>
          <option value="Software Development">Software Development</option>
          <option value="Strategy">Strategy</option>
          <option value="User Experience">User Experience</option>
          <option value="Venture Capital">Venture Capital</option>
        </select>
        <br><br>
        <input class="button-primary" value="Ask your Question" type="submit">
        <div class="float-right">
          <input name="anonymouse" id="anonymouse" type="checkbox" {{ old('anonymouse') ? 'checked' : '' }}>
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

@section('javascript')
<script type="text/javascript" src="{{ elixir('js/all.js') }}"></script>
@endsection
