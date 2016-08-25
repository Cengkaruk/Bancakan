@extends('layout')

@section('content')
<div class="row signup">
  <div class="column column-33">
    <h4>Register for Bancakan</h4>
    <form method="POST" action="{{ url('/register') }}">
      {{ csrf_field() }}
      <fieldset>
        @if ($errors->has('name'))
          <small class="float-left">{{ $errors->first('name') }}</small>
        @endif
        <input name="name" value="{{ old('name') }}" placeholder="Fullname" type="text" class="{{ $errors->has('name') ? 'outline-error' : '' }}">
        @if ($errors->has('email'))
          <small class="float-left">{{ $errors->first('email') }}</small>
        @endif
        <input name="email" value="{{ old('email') }}" placeholder="Email" type="email" class="{{ $errors->has('email') ? 'outline-error' : '' }}">
        @if ($errors->has('password'))
          <small class="float-left">{{ $errors->first('password') }}</small>
        @endif
        <input name="password" placeholder="Password" type="password" class="{{ $errors->has('password') ? 'outline-error' : '' }}">
        @if ($errors->has('password_confirmation'))
          <small class="float-left">{{ $errors->first('password_confirmation') }}</small>
        @endif
        <input name="password_confirmation" placeholder="Password Confirmation" type="password" class="{{ $errors->has('password_confirmation') ? 'outline-error' : '' }}">
        <input class="button-primary" value="Register" type="submit">
        <p>By registering, you agree to our <a href="#">Community Guidelines</a></p>
      </fieldset>
    </form>
  </div>
</div>
@endsection
