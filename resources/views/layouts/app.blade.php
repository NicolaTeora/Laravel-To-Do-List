<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ENV('APP_NAME')}} - @yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])
</head>
<body>
    @include('layouts.partials.nav') {{-- navbar --}}
    
    <div class="container">

        <h1 class="my-2 text-primary text-center">Tasks APP</h1>

        @yield('content')
    </div>
</body>
</html>