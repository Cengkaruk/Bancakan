@extends('layout')

@section('content')
<div class="row signup">
  <div class="column column-33">
    <h4>Reset Password</h4>
    <form method="POST" action="{{ url('/password/reset') }}">
      {{ csrf_field() }}
      <input type="hidden" name="token" value="{{ $token }}">
      <fieldset>
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
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-btn fa-refresh"></i> Reset Password
        </button>
      </fieldset>
    </form>
  </div>
</div>
@endsection
