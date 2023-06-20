@extends('templates.index')
@section('css')
    <!-- include the style -->
    <link rel="stylesheet" href="{{ asset('/css/alertify.min.css') }}" />
    <!-- include a theme -->
    <link rel="stylesheet" href="{{ asset('/css/themes/default.min.css') }}" />
@endsection
@section('content')
    @if (session('message') != null)
        <div class="mb-3 inline-flex w-full items-center rounded-lg {{ session('type') == 'success' ? 'bg-green-100 text-green-700' : 'bg-rose-100 text-rose-700' }}  px-6 py-5 text-base text-green-700"
            role="alert">
            <span class="mr-2">
                @if (session('type') == 'success')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                            clip-rule="evenodd" />
                    </svg>
                @elseif (session('type') == 'error')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                    </svg>
                @endif
            </span>
            {{ session('message') }}
        </div>
    @endif
    <div class="flex flex-col md:flex-row shadow-xl rounded-sm gap-3 py-3 ">
        <div
            class="basis-1/2 p-3 content-start grid grid-cols-1 border-b-[1px] md:border-b-0 md:border-r-[1px] border-slate-200 dark:border-indigo-600 ">
            <div class="px-1">
                @if ($user->is_teacher)
                    <label for="teacher_identification_number"
                        class="block text-sm font-medium leading-6 text-dark dark:text-indigo-300">
                        Teacher Identification Number</label>
                @elseif ($user->is_student)
                    <label for="student_identification_number"
                        class="block text-sm font-medium leading-6 text-dark dark:text-indigo-300">
                        Student Identification Number</label>
                @else
                    <label for="developer"
                        class="block text-sm font-medium leading-6 text-dark dark:text-indigo-300">Developer</label>
                @endif
                <div class="mt-2">
                    <input type="text" readonly
                        @if ($user->is_teacher) name="teacher_identification_number" id="teacher_identification_number" value="{{ $user->detail_users->teacher_identification_number ?? '' }}" @elseif ($user->is_student) name="student_identification_number" id="student_identification_number" value="{{ $user->detail_users->student_identification_number ?? '' }}" @else name="developer" id="developer" value="you are a developer" @endif
                        class="block w-full
                                rounded-md border-0 py-1.5 text-dark bg-slate-200 dark:bg-indigo-900 dark:ring-indigo-600 dark:text-indigo-200
                                shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="px-1">
                <label for="username"
                    class="block text-sm font-medium leading-6 text-dark dark:text-indigo-300">Username</label>
                <div class="mt-2">
                    <input readonly type="text" name="username" id="username" value="{{ $user->username ?? '' }}"
                        class="block w-full bg-slate-200 dark:bg-indigo-900
                                rounded-md border-0 py-1.5 text-dark dark:ring-indigo-600 dark:text-indigo-200
                                shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="px-1">
                <label for="full_name" class="block text-sm font-medium leading-6 text-dark dark:text-indigo-300">Full
                    Name</label>
                <div class="mt-2">
                    <input readonly type="text" name="full_name" id="full_name"
                        value="{{ $user->detail_users->full_name ?? '' }}"
                        class="block w-full
                                rounded-md border-0 py-1.5 text-dark bg-slate-200 dark:bg-indigo-900 dark:ring-indigo-600 dark:text-indigo-200
                                shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            @if ($user->is_teacher || $user->is_developer)
                <div class="px-1">
                    <label for="phone_numbers"
                        class="block text-sm font-medium leading-6 text-dark dark:text-indigo-300">Phone
                        Number</label>
                    <div class="mt-2">
                        <input readonly type="text" name="phone_numbers" id="phone_numbers"
                            value="{{ $user->detail_users->phone_numbers ?? '' }}"
                            class="block w-full
                                rounded-md border-0 py-1.5 text-dark bg-slate-200 dark:bg-indigo-900 dark:ring-indigo-600 dark:text-indigo-200
                                shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            @endif
            <div class="mt-3 px-1">
                <a href="{{ route('profile.edit', $user->id) }}"
                    class="inline-block mt-1 rounded bg-orange-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b] transition duration-150 ease-in-out hover:bg-orange-600 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:bg-orange-600 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:outline-none focus:ring-0 active:bg-orange-700 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]">
                    Edit
                </a>
                <button type="button" id="change-password"
                    class="inline-block mt-1 rounded bg-rose-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-rose-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-rose-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                    Request Change Password
                </button>
            </div>
        </div>
        <div class="basis-1/2 px-3 min-h-[40vh] max-h-[40vh] overflow-y-auto">
            <div
                class="sticky top-0 text-center bg-slate-500 dark:bg-indigo-300 p-5 mb-3 rounded-md bg-opacity-25 dark:bg-opacity-25 dark:text-white">
                Your Logs
            </div>
            @forelse ($user->logs as $log)
                <div class="mb-3 inline-flex w-full items-center justify-between rounded-lg {{ $log->type == 'success' ? 'bg-violet-100 text-violet-700' : 'bg-rose-100 text-rose-700' }} px-6 py-5 text-base"
                    role="alert">
                    <div class="flex items-center">
                        <span class="mr-2">
                            @if ($log->type == 'success')
                                <i class="fa-solid fa-check"></i>
                            @else
                                <i class="fa-solid fa-xmark"></i>
                            @endif
                        </span>
                        <div class="ml-3">
                            <div class="text-xl capitalize">{{ $log->name }}</div>
                            <div class="text-sm opacity-60">{{ $log->description }}</div>
                        </div>
                    </div>
                    <div class="text-sm">
                        {{ convertDateTimeToDiff($log->created_at) }}
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#change-password').click(function(e) {
                alertify.confirm('Change Password Request',
                    'are you sure you want to change your password?',
                    function() {
                        alertify.prompt("What's Your Reason", 'Your Reasone', '', function(evt,
                            value) {
                            alertify.success('Processing Your Request');
                            setTimeout(() => {
                                window.location.href =
                                    `/profile/{{ auth()->user()->username }}/request-change-password?reason=${value}`;
                            }, 1500);
                        }, function() {
                            alertify.error('Cancelling Your Request');
                        });
                    },
                    function() {
                        alertify.error('Cancelling Your Request');
                    });
            });
        });
    </script>
@endsection
