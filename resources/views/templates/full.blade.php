<!DOCTYPE html>
<html lang="en" class="h-full font-sans subpixel-antialiased font-light" xmlns:aria="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>

<body class="min-h-full transition duration-150 ease-in-out bg-slate-800 dark:bg-slate-300 ">
    @yield('content')
</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    function processChangeTheme(key) {
        if (key == 'dark') {
            $('html').addClass('dark')
            localStorage.setItem('theme', 'dark');
        } else {
            $('html').removeClass('dark')
            localStorage.setItem('theme', 'light');
        }
    }

    function loadTheme() {
        if (localStorage.getItem('theme') == 'light') {
            processChangeTheme(localStorage.getItem('theme'));
        } else {
            processChangeTheme(localStorage.getItem('theme'));
        }
    }

    $(document).ready(function() {
        loadTheme();
    });
</script>

</html>
