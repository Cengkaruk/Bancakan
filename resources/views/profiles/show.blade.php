@extends('layout')

@section('content')
<div class="row profile">
  <div class="column column-50">
    <h4>{{ Auth::user()->name }}</h4>
    <small>@ {{ (Auth::user()->username) ? Auth::user()->username : 'Username' }}</small> -
    @if (Auth::user()->title)
      <span>{{ Auth::user()->title }}</span><br>
    @else
      <span>Your Title</span><br>
    @endif
    <span><i class="fa fa-map-marker"></i> {{ (Auth::user()->location) ? Auth::user()->location : 'Location' }}</span><br><br>
    {!! (Auth::user()->bio) ? nl2br(e(Auth::user()->bio)) : 'About yourself in here.' !!}
  </div>
  <div class="column column-50">
    <table cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td>
            <div>
              <h3>15</h3>
              <em>Questions</em>
            </div>
          </td>
          <td>
            <div>
              <h3>12</h3>
              <em>Answers</em>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <p>Product Design, Development</p>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <small>Member Since: {{ Auth::user()->created_at->format('j F Y') }}</small>
          </td>
        </tr>
      </tbody>
    </table>
    <a href="{{ route('profiles.edit') }}" class="button">Edit Profile</a>
    <a href="{{ route('profiles.password') }}" class="button button-outline">Change Password</a>
    <a href="{{ url('/logout') }}" class="button button-outline button-outline-danger">Logout</a>
  </div>
</div>
<hr class="separator">
@endsection
