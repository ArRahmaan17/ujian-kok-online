@extends('templates.index')
@section('content')
    <h1 class="text-2xl">Daftar Ujian Hari ini</h1>
    <ul role="list" class="divide-y divide-blue-300 w-11/12 md:w-full mx-auto">
        <li class="flex justify-between gap-x-6 py-5 bg-blue-200 rounded-md mt-2 p-1">
            <div class="flex gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">Leslie Alexander</p>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">leslie.alexander@example.com</p>
                </div>
            </div>
            <div class="hidden sm:flex sm:flex-col sm:items-end ">
                <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
                <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time>
                </p>
            </div>
        </li>
        <li class="flex justify-between gap-x-6 py-5 bg-blue-200 rounded-md mt-2 p-1">
            <div class="flex gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">Leslie Alexander</p>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">leslie.alexander@example.com</p>
                </div>
            </div>
            <div class="hidden sm:flex sm:flex-col sm:items-end">
                <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
                <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time>
                </p>
            </div>
        </li>
    </ul>
@endsection
