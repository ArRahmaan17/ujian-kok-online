<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-blue-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ url('/') }}">
                                <img class="h-8 w-8"
                                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                                    alt="Your Company">
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="#"
                                    class="{{ explode('/', url()->full())[3] == 'dashboard' ? 'bg-blue-900 text-white' : 'text-dark hover:bg-blue-500 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Dashboard</a>
                                <a href="#"
                                    class="{{ explode('/', url()->full())[3] == 'schedule' ? 'bg-blue-900 text-white' : 'text-dark hover:bg-blue-500 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Schedule</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">

                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button type="button"
                                        class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button"
                            class="inline-flex items-center justify-center rounded-md bg-blue-700 p-2 text-white hover:bg-blue-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#"
                        class="{{ explode('/', url()->full())[3] == 'dashboard' ? 'bg-blue-900 text-white' : 'text-dark hover:bg-blue-500 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Dashboard</a>
                    <a href="#"
                        class="{{ explode('/', url()->full())[3] == 'schedule' ? 'bg-blue-900 text-white' : 'text-dark hover:bg-blue-500 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Schedule</a>
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-dark">{{ auth()->user()->name }}
                            </div>
                            <div class="text-sm font-medium leading-none text-gray-600">
                                No Induk : {{ auth()->user()->student_identification_number }} | Kelas
                                : {{ auth()->user()->class }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-blue-100 shadow-md ">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 grid grid-cols-2 grid-flow-col gap-4">
                <div class="text-3xl font-bold tracking-tight text-gray-900 col-span-2">Dashboard</div>
                <div class="text-1xl font-bold tracking-tight text-slate-400 place-self-center">
                    {{ auth()->user()->homeroom_teacher }}
                </div>
            </div>
        </header>

        <main>
            <div class="mx-auto w-full md:w-4/5 py-6 sm:px-6 lg:px-8 mt-4">
                @yield('content')
            </div>
        </main>
    </div>

</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('button[aria-controls=mobile-menu]').click(function() {
            if ($("#mobile-menu").hasClass('md:hidden')) {
                $("#mobile-menu").removeClass('md:hidden').addClass('hidden');
            } else {
                $("#mobile-menu").removeClass('hidden').addClass('md:hidden');
            }
        })
    });
</script>

</html>
