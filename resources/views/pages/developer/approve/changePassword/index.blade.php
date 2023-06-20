@extends('templates.index')
@section('css')
@endsection
@section('content')
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
                        <button type="button"
                            class="basis-1/2 inline-block rounded bg-rose-400 px-1 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-rose-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-rose-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-rose-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                            change password
                        </button>
                        <button type="button"
                            class="basis-1/2 inline-block rounded bg-orange-400 px-1 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-orange-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-orange-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-orange-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                            reset password
                        </button>
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
