@extends('layout')

@section('content')
<div class="row profile">
  <div class="column column-50">
    <h4>{{ $profile->name }}</h4>
    <small>@ {{ ($profile->username) ? $profile->username : 'Username' }}</small> -
    @if ($profile->title)
      <span>{{ $profile->title }}</span><br>
    @else
      <span>Your Title</span><br>
    @endif
    <span><i class="fa fa-map-marker"></i> {{ ($profile->location) ? $profile->location : 'Location' }}</span><br><br>
    {!! ($profile->bio) ? nl2br(e($profile->bio)) : 'About yourself in here.' !!}
  </div>
  <div class="column column-50">
    <table cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td>
            <div>
              <h3>{{ $profile->questions->count() }}</h3>
              <em>Questions</em>
            </div>
          </td>
          <td>
            <div>
              <h3>{{ $profile->answers->count() }}</h3>
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
            <small>Member Since: {{ $profile->created_at->format('j F Y') }}</small>
          </td>
        </tr>
      </tbody>
    </table>
    @if (Auth::check())
    @if ($profile->id == Auth::user()->id)
    <a href="{{ route('profiles.edit') }}" class="button">Edit Profile</a>
    <a href="{{ route('profiles.password') }}" class="button button-outline">Change Password</a>
    <a href="{{ url('/logout') }}" class="button button-outline button-outline-danger">Logout</a>
    @endif
    @endif
  </div>
</div>
<hr class="separator">
@endsection
