@extends('layout')

@section('content')
<div class="row signup">
  <div class="column column-33">
    <h4>Reset Password</h4>
    <form method="POST" action="{{ url('/password/email') }}">
      {{ csrf_field() }}
      @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif
      <fieldset>
        @if ($errors->has('email'))
        <small class="float-left">{{ $errors->first('email') }}</small>
        @endif
        <input name="email" value="{{ old('email') }}" placeholder="Email" type="email" class="{{ $errors->has('email') ? 'outline-error' : '' }}">
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
        </button>
      </fieldset>
    </form>
  </div>
</div>
@endsection
