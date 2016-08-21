<nav class="navigation">
  <section class="container">
    <a class="navigation-title" href="{{ route('questions.index') }}">
      <img class="img" src="https://milligram.github.io/img/logo.svg" alt="Bancakan" title="Bancakan" height="30">
      <h1 class="title">Bancakan</h1>
    </a>
    @if(Auth::check())
    <ul class="navigation-list float-right">
      <li class="navigation-item">
        <a class="navigation-link" href="#"><i class="fa fa-bell-o"></i></a>
      </li>
      <li class="navigation-item">
        <a class="navigation-link" href="{{ route('profiles.show') }}">{{ Auth::user()->name }}</a>
      </li>
    </ul>
    @else
    <ul class="navigation-list float-right">
      <li class="navigation-item">
        <a class="navigation-link" href="{{ url('/register') }}">Register</a>
      </li>
      <li class="navigation-item">
        <a class="navigation-link" href="{{ url('/login') }}">Login</a>
      </li>
    </ul>
    @endif
  </section>
</nav>
