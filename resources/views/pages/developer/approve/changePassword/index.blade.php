@extends('templates.index')
@section('css')
@endsection
@section('content')
    @if (session('invalid'))
        <div class="mb-3 inline-flex w-full items-center rounded-lg bg-orange-100 px-6 py-5 text-base text-orange-800"
            role="alert">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path fill-rule="evenodd"
                        d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            {!! session('invalid')['message'] !!}
        </div>
    @endif
    @if (session('success'))
        <div class="mb-3 inline-flex w-full items-center rounded-lg bg-orange-100 px-6 py-5 text-base text-orange-800"
            role="alert">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            {!! session('success')['message'] !!}
        </div>
    @endif
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-3 p-3">
        @forelse ($usersRequested as  $user)
            <div
                class="block rounded-lg bg-white text-center shadow-[0_2px_20px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:shadow-indigo-400 dark:bg-black dark:ring-2 dark:ring-indigo-600">
                <div class="border-b-2 border-neutral-100 px-6 py-3 dark:border-indigo-600 dark:text-neutral-50 capitalize">
                    {{ $user->username }} <br> <span class="capitalize text-sm dark:text-slate-300">
                        request to change password</span>
                </div>
                <div class="p-6">
                    <h5 class="mb-2 leading-tight text-neutral-800 dark:text-neutral-50">
                        Reason To <br><span class="font-bold text-md">Change / Reset</span><br> Password
                    </h5>
                    <p class="mb-4 text-neutral-600 dark:text-neutral-200 text-sm capitalize">
                        {{ $user->reason }}
                    </p>
                    <div class="flex gap-2 justify-center">
                        <a href="{{ route('support.accept-change-password', $user->user_id) }}"
                            class="basis-1/2 inline-block rounded bg-rose-400 p-2 text-xs capitalize leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-rose-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-rose-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-rose-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                            change password
                        </a>
                        <a href="{{ route('support.accept-reset-password', $user->user_id) }}"
                            class="basis-1/2 inline-block rounded bg-orange-400 p-2 text-xs capitalize leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-orange-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-orange-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-orange-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                            reset password
                        </a>
                    </div>
                </div>
                <div
                    class="border-t-2 border-neutral-100 px-6 py-3 dark:border-indigo-600 dark:text-neutral-50 capitalize font-bold">
                    {{ convertDateTimeToDiff($user->created_at) }}
                </div>
            </div>
        @empty
        @endforelse

    </div>
@endsection
@section('script')
@endsection
