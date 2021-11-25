<html>
    <header>
        <title>Error page</title>
    </header>

    <body>
        <h1>{{ $code }}: {{ $message }}</h1>
        <a href="{{URL::to('/')}}">Back to home</a>
    </body>
</html>
