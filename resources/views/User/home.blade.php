<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Home</title>
</head>
<body>
    <center>
        <h1>Home</h1>
        Hi! User
        <a href="{{ route('logout')}} " class="underline">Logout</a>
    </center>
</body>
</html>