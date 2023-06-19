@extends('templates.full')
@section('content')
    <div class="mt-24">
        <img class="w-48 sm:w-1/4 xl:w-2/6 md:h-auto md:rounded-none rounded-full mx-auto"
            src="{{ asset('asset/undraw_location_search_re_ttoj.svg') }}">
        <p class="dark:font-bold dark:text-indigo-700 capitalize text-center mt-7 text-xl">Hiiii, {{ $username }}</p>
        <p class="dark:font-bold dark:text-indigo-700 capitalize text-center mt-2 text-sm">please wait for your teacher to
            approve it</p>
    </div>
@endsection
