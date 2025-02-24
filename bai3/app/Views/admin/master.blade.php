<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP3 - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <header>
            <nav>Menu Admin

                <strong>{{ $_SESSION['user']->username ?? '' }}</strong>
                <a href="{{ APP_URL . 'logout' }}">Logout</a>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <p>Footer Admin</p>
        </footer>
    </div>
</body>

</html>
