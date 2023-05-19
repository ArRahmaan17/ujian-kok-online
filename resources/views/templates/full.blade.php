<!DOCTYPE html>
<html lang="en" class="h-full dark" xmlns:aria="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>

<body {{-- class="h-full transition duration-150 ease-out bg-gradient-to-b from-slate-300 to-gray-800 dark:bg-gradient-to-t "> --}} class="h-full transition duration-1000 ease-in-out bg-slate-300 dark:bg-slate-700 ">
    @yield('content')
</body>

</html>
