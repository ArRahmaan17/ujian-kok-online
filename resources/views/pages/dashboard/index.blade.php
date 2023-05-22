@extends('templates.index')
@section('content')
    <h1 class="text-4xl dark:text-indigo-600 font-bold">Daftar Ujian Hari ini</h1>
    <ul role="list" class="divide-y divide-blue-300 w-11/12 md:w-full mx-auto">
        <li
            class="flex justify-between gap-x-6 py-5 bg-transparent ring-2 ring-slate-600 dark:bg-black rounded-md mt-4 p-1 shadow-2xl dark:shadow-indigo-600 dark:ring-indigo-600">
            <div class="flex gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-md font-semibold leading-6 text-indigo-800 dark:text-white">Leslie Alexander</p>
                    <p class="mt-1 truncate text-sm leading-5 text-indigo-800 dark:text-gray-400">
                        leslie.alexander@example.com</p>
                </div>
            </div>
            <div class="hidden sm:flex sm:flex-col sm:items-end ">
                <p class="text-md leading-6 text-indigo-800 dark:text-white">Co-Founder / CEO</p>
                <p class="mt-1 text-sm leading-5 text-indigo-800 dark:text-gray-400">Last seen <time
                        datetime="2023-01-23T13:23Z">3h
                        ago</time>
                </p>
            </div>
        </li>
        <li
            class="flex justify-between gap-x-6 py-5 bg-transparent ring-2 ring-slate-600 dark:bg-black rounded-md mt-4 p-1 shadow-2xl dark:shadow-indigo-600 dark:ring-indigo-600">
            <div class="flex gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-md font-semibold leading-6 text-indigo-800 dark:text-white">Leslie Alexander</p>
                    <p class="mt-1 truncate text-sm leading-5 text-indigo-800 dark:text-gray-400">
                        leslie.alexander@example.com</p>
                </div>
            </div>
            <div class="hidden sm:flex sm:flex-col sm:items-end ">
                <p class="text-md leading-6 text-indigo-800 dark:text-white">Co-Founder / CEO</p>
                <p class="mt-1 text-sm leading-5 text-indigo-800 dark:text-gray-400">Last seen <time
                        datetime="2023-01-23T13:23Z">3h
                        ago</time>
                </p>
            </div>
        </li>
    </ul>
@endsection
