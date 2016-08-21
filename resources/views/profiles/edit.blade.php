@extends('layout')

@section('content')
<div class="row">
  <div class="column column-50">
    <h4>Edit Profile</h4>
    @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    @endif
    <form method="POST" action="{{ route('profiles.store') }}">
      {{ csrf_field() }}
      <fieldset>
        <label>Username</label>
        <input type="text" name="username" placeholder="Mentionable username" value="{{ Auth::user()->username }}">
        <label>Name</label>
        <input type="text" name="name" placeholder="Your fullname" value="{{ Auth::user()->name }}">
        <label>Title</label>
        <input type="text" name="title" placeholder="Founder of...or something else" value="{{ Auth::user()->title }}">
        <label>Location</label>
        <input type="text" name="location" placeholder="Your location" value="{{ Auth::user()->location }}">
        <label>Bio</label>
        <textarea name="bio" placeholder="About yourself">{{ Auth::user()->bio }}</textarea>
        <input class="button-primary" value="Save" type="submit">
      </fieldset>
    </form>
  </div>
  <div class="column column-40 column-offset-10">
    <h4>Tips</h4>
    <ul>
      <li>Be yourself, community members need to know who you are.</li>
      <li>Real people and reputation is the key.</li>
    </ul>
  </div>
</div>
<hr class="separator">
@endsection
