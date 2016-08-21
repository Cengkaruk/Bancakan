<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv=x-ua-compatible content="ie=edge">
  <meta name="robots" content="index, follow">
  <meta name="theme-color" content="#f4f5f6">
  <meta name="apple-mobile-web-app-status-bar-style" content="#f4f5f6">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Cengkaruk">
  <meta name="description" content="Bancakan - Startup advice from the community">
  <title>Bancakan - Startup advice from the community</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
</head>
<body>
  <main class="wrapper">
    @include('partials.navigation')
    <section class="container">
      @yield('content')
    </section>
  </main>
</body>
@yield('javascript')
</html>
