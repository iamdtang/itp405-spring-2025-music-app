<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>@yield('title')</title>
</head>
<body>
  <div class="container">
    <ul class="nav d-flex justify-content-end">
      @if (Auth::check())
        <li class="nav-item">
          <a href="{{ route('profile.index') }}" class="nav-link">Profile</a>
        </li>
        <li class="nav-item">
          <a href="/logout" class="nav-link">Logout</a>
        </li>
      @else
        <li class="nav-item">
          <a href="{{ route('registration.index') }}" class="nav-link">Register</a>
        </li>
        <li class="nav-item">
          <a href="/login" class="nav-link">Login</a>
        </li>
      @endif
    </ul>

    @yield('main')
  </div>
</body>
</html>