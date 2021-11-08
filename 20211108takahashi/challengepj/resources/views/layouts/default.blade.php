<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/index.css')}}">
  @stack('css')
  <title>@yield('title')</title>
</head>
<body>
  <header class="header">
    <h1>@yield('title')</h1>
  </header>
  <main>
    <div class="main__content">
      @yield('content')
    </div>
  </main>
</body>
</html>