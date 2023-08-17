@extends('templates.index')
@section('css')
@endsection
@section('content')
    <div class="py-18 sm:py-26">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="flex justify-end">
                <a href="{{ route('classroom.upload') }}"
                    class="inline-block rounded bg-blue-400 px-6 mx-1 pb-2 pt-2.5 text-xs leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-blue-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-blue-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                    <i class="fa-solid fa-upload"></i> Classroom Upload
                </a>
                <a href="{{ route('classroom.classroom-template') }}"
                    class="inline-block rounded bg-orange-400 px-6 mx-1 pb-2 pt-2.5 text-xs leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b] transition duration-150 ease-in-out hover:bg-orange-600 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:bg-orange-600 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:outline-none focus:ring-0 active:bg-orange-700 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]">
                    <i class="fa-solid fa-download"></i> Excel Classroom Template
                </a>
                <a href="{{ route('classroom.homeroom-template') }}"
                    class="inline-block rounded bg-orange-400 px-6 mx-1 pb-2 pt-2.5 text-xs leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b] transition duration-150 ease-in-out hover:bg-orange-600 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:bg-orange-600 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:outline-none focus:ring-0 active:bg-orange-700 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]">
                    <i class="fa-solid fa-download"></i> Excel Homeroom Template
                </a>
            </div>
            <dl class="grid grid-cols-1 gap-x-8 gap-y-12 text-center md:grid-cols-2 lg:grid-cols-3 mt-4">
                @foreach ($classrooms as $class)
                    <div
                        class="mx-auto flex rounded-md sm:max-w-sm max-w-xl flex-col gap-y-4 ring-2 ring-indigo-300 dark:ring-white p-3 shadow-inner shadow-indigo-200 dark:shadow-white">
                        <dt class="text-base leading-7 text-gray-600 dark:text-indigo-300">Homeroom
                            {{ $class->homeroom->full_name }}</dt>
                        <a href="{{ route('classroom.detail', $class->name) }}"
                            class="order-first text-3xl max-w-full tracking-tight text-gray-900 dark:text-indigo-700 sm:text-2xl">
                            {{ $class->name }}
                        </a>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
@endsection
@section('script')
@endsection
