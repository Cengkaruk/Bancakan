@extends('layout')

@section('content')
<div class="row">
  <div class="column column-40">
    <h4>Change Password</h4>
    @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    @endif
    <form method="POST" action="{{ route('profiles.password.store') }}">
      {{ csrf_field() }}
      <fieldset>
        <label>Current Password</label>
        <input type="password" name="password_current" placeholder="Your current password">
        <label>New Password</label>
        <input type="password" name="password" placeholder="Your new password">
        <input type="password" name="password_confirmation" placeholder="Password confirmation">
        <input class="button-primary" value="Change" type="submit">
      </fieldset>
    </form>
  </div>
  <div class="column column-40 column-offset-10">
    <h4>Tips</h4>
    <ul>
      <li>Create complex password you'll always remember with peotry.</li>
    </ul>
  </div>
</div>
<hr class="separator">
@endsection
