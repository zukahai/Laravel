<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <h1>Heder</h1>
    </header>
    <main>
        <aside>
            Main sideber
        </aside>
        <div class="content">
            @yield('content')
        </div>
    </main>
    <footer>
        <h1>Footer</h1>
    </footer>
</body>
</html>