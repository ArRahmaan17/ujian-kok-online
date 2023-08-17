@extends('templates.index')
@section('content')
    @if (session('denied'))
        <div class="mb-3 inline-flex w-full items-center rounded-lg bg-rose-100 px-6 py-5 text-base text-rose-700 capitalize"
            role="alert">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path fill-rule="evenodd"
                        d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            {{ session('denied')['message'] }}
        </div>
    @endif
    <h1 class="text-4xl dark:text-indigo-600">Daftar Ujian Hari ini</h1>
    <ul role="list" class="divide-y divide-blue-300 w-11/12 md:w-full mx-auto">
        <li
            class="flex flex-wrap justify-between gap-x-6 py-5 bg-transparent ring-2 ring-slate-600 dark:bg-black rounded-md mt-4 p-1 shadow-2xl dark:shadow-indigo-600 dark:ring-indigo-600">
            <div class="flex flex-none gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-md leading-6 text-indigo-800 dark:text-white">Leslie Alexander</p>
                    <p class="mt-1 truncate text-sm leading-5 text-indigo-800 dark:text-gray-400">
                        leslie.alexander@example.com</p>
                </div>
            </div>
            <div class="hidden sm:flex sm:flex-col sm:items-end">
                <p class="text-md leading-6 text-indigo-800 dark:text-white">Co-Founder / CEO</p>
                <p class="mt-1 text-sm leading-5 text-indigo-800 dark:text-gray-400">Last seen <time
                        datetime="2023-01-23T13:23Z">3h
                        ago</time>
                </p>
            </div>
            <div class="my-3 h-2 w-full bg-neutral-200 dark:bg-neutral-600 rounded-md">
                <div class="h-2 bg-gradient-to-r from-rose-600 via-orange-500 to-green-600 via-100% from-30% dark:bg-gradient-to-r dark:from-rose-500 dark:via-orange-500 dark:to-green-500 rounded-md"
                    style="width: 25%"></div>
                <div class="flex justify-between">
                    <span class="text-red-500 dark:text-rose-400">finish at</span>
                    <span class="text-green-500 dark:text-green-400">start at</span>
                </div>
            </div>
        </li>
        <li
            class="flex flex-wrap justify-between gap-x-6 py-5 bg-transparent ring-2 ring-slate-600 dark:bg-black rounded-md mt-4 p-1 shadow-2xl dark:shadow-indigo-600 dark:ring-indigo-600">
            <div class="flex flex-none gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-md leading-6 text-indigo-800 dark:text-white">Leslie Alexander</p>
                    <p class="mt-1 truncate text-sm leading-5 text-indigo-800 dark:text-gray-400">
                        leslie.alexander@example.com</p>
                </div>
            </div>
            <div class="hidden sm:flex sm:flex-col sm:items-end">
                <p class="text-md leading-6 text-indigo-800 dark:text-white">Co-Founder / CEO</p>
                <p class="mt-1 text-sm leading-5 text-indigo-800 dark:text-gray-400">Last seen <time
                        datetime="2023-01-23T13:23Z">3h
                        ago</time>
                </p>
            </div>
            <div class="my-3 h-2 w-full bg-neutral-200 dark:bg-neutral-600 rounded-md">
                <div class="h-2 bg-gradient-to-r from-rose-600 via-orange-600 to-green-600 dark:bg-gradient-to-r dark:from-rose-500 dark:via-orange-500 dark:to-green-500 rounded-md"
                    style="width: 100%"></div>
                <div class="flex justify-between">
                    <span class="text-red-500 dark:text-rose-400">finish at</span>
                    <span class="text-green-500 dark:text-green-400">start at</span>
                </div>
            </div>
        </li>
    </ul>
@endsection
