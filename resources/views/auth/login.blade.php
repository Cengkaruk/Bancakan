@extends('layout')

@section('content')
<div class="row signup">
  <div class="column column-33">
    <h4>Login</h4>
    <form method="POST" action="{{ url('/login') }}">
      {{ csrf_field() }}
      <fieldset>
        @if ($errors->has('email'))
          <small class="float-left">{{ $errors->first('email') }}</small>
        @endif
        <input name="email" value="{{ old('email') }}" placeholder="Email" type="email" class="{{ $errors->has('email') ? 'outline-error' : '' }}">
        @if ($errors->has('password'))
          <small class="float-left">{{ $errors->first('password') }}</small>
        @endif
        <input name="password" placeholder="Password" type="password" class="{{ $errors->has('email') ? 'outline-error' : '' }}">
        <div class="float-right">
          <input type="checkbox" name="remember">
          <label class="label-inline">Remember me</label>
        </div>
        <div class="float-left">
          <input class="button-primary" value="Login" type="submit">
        </div>
        <br><br><br><br>
        <p>Forgot your password? <a href="{{ url('/password/reset') }}">Click here</a></p>
      </fieldset>
    </form>
  </div>
</div>
@endsection
