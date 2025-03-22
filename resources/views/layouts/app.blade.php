<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <nav>
            <a href="/">Home</a> |
            <a href="{{ route('users.index') }}">Users</a> |
            {{-- <a href="{{ route('logout') }}">Logout</a> --}}
        </nav>
    </header>

    <div class="container">
        @yield('content')  <!-- This is where child content will be inserted -->
    </div>

    <footer>
        <p>Laravel Training @2025</p>
    </footer>
</body>
</html>
