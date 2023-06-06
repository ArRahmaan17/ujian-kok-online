<!DOCTYPE html>
<html lang="en" class="h-full" xmlns:aria="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <style>
        *::-webkit-scrollbar {
            width: 6px;
            /* Adjust the width as needed */
        }

        *::-webkit-scrollbar-thumb {
            background-color: #888;
            /* Adjust the color as needed */
            border-radius: 3px;
            /* Adjust the border radius as needed */
        }

        *::-webkit-scrollbar-track {
            background-color: #f1f1f1;
            /* Adjust the color as needed */
            border-radius: 3px;
            /* Adjust the border radius as needed */
        }
    </style>
</head>

<body class="h-full transition-colors bg-white dark:bg-black">
    <div class="min-h-full">
        <x-navbar-component />
        <x-header-component />
        <main class="">
            <div class="mx-auto w-full md:w-4/5 py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>

</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="https://kit.fontawesome.com/768f649122.js" crossorigin="anonymous"></script>
<script>
    let moonsvg =
        `<svg class="h-8 w-8 hover:scale-95" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Environment / Moon"> <path id="Vector" d="M9 6C9 10.9706 13.0294 15 18 15C18.9093 15 19.787 14.8655 20.6144 14.6147C19.4943 18.3103 16.0613 20.9999 12 20.9999C7.02944 20.9999 3 16.9707 3 12.0001C3 7.93883 5.69007 4.50583 9.38561 3.38574C9.13484 4.21311 9 5.09074 9 6Z" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>`;
    let sunsvg =
        `<svg class="h-8 w-8 hover:scale-95" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Environment / Sun"> <path id="Vector" d="M12 4V2M12 20V22M6.41421 6.41421L5 5M17.728 17.728L19.1422 19.1422M4 12H2M20 12H22M17.7285 6.41421L19.1427 5M6.4147 17.728L5.00049 19.1422M12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12C17 14.7614 14.7614 17 12 17Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>`;

    function toggleElement(identifier, classname) {
        $(`button[aria-controls=${identifier}]`).click(function() {
            if ($(`#${identifier}`).hasClass(`${classname}`)) {
                $(`#${identifier}`).removeClass(`${classname}`).addClass('hidden');
            } else {
                $(`#${identifier}`).removeClass('hidden').addClass(`${classname}`);
            }
        });
    }

    function proccessChangeTheme(key) {
        if (key == 'dark') {
            $('html').addClass('dark')
            localStorage.setItem('theme', 'dark');
            $(`button[aria-data=change-theme`).removeClass('nus').addClass('noom').html(moonsvg);
        } else {
            $('html').removeClass('dark')
            localStorage.setItem('theme', 'light');
            $(`button[aria-data=change-theme`).removeClass('noom').addClass('nus').html(sunsvg);
        }
    }

    function loadTheme() {
        if (localStorage.getItem('theme') == 'light') {
            proccessChangeTheme(localStorage.getItem('theme'));
        } else {
            proccessChangeTheme(localStorage.getItem('theme'));
        }
    }
    $(document).ready(function() {
        loadTheme();
        toggleElement('mobile-menu', 'md:hidden');
        toggleElement('dropdown-navbar', 'absolute');
        $(`button[aria-data=change-theme`).click(function() {
            if (!$('html').hasClass('dark')) {
                proccessChangeTheme('dark')
            } else {
                proccessChangeTheme('light')
            }
        });
    });
</script>
@yield('script')

</html>
