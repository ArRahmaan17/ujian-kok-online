@extends('templates.index')
@section('content')
    @if (count($errors) > 0)
        <div class="mb-3 inline-flex w-full items-center rounded-lg bg-red-100 px-6 py-5 text-base text-red-700"
            role="alert">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            <div class="grid">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        </div>
    @endif
    @if (session('message') != null)
        <div class="mb-3 inline-flex w-full items-center rounded-lg bg-red-100 px-6 py-5 text-base text-red-700"
            role="alert">
            <span class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            {{ session('message') }}
        </div>
    @endif
    <form action="{{ route('profile.update', $user->id) }}" method="POST">
        @method('PUT')
        <div class="flex flex-col md:flex-row shadow-xl rounded-sm gap-3 py-3 ">
            <div class="basis-full p-3 grid grid-cols-1 min-h-[40vh] max-h-[40vh] content-start">
                @csrf
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
                        <input type="text" name="username" id="username" value="{{ $user->username ?? '' }}"
                            class="block w-full
                                rounded-md border-0 py-1.5 text-dark dark:bg-black dark:ring-indigo-600 dark:text-indigo-200
                                shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="px-1">
                    <label for="full_name" class="block text-sm font-medium leading-6 text-dark dark:text-indigo-300">Full
                        Name</label>
                    <div class="mt-2">
                        <input type="text" name="full_name" id="full_name"
                            value="{{ $user->detail_users->full_name ?? '' }}"
                            class="block w-full
                                rounded-md border-0 py-1.5 text-dark dark:bg-black dark:ring-indigo-600 dark:text-indigo-200
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
                            <input type="text" name="phone_numbers" id="phone_numbers"
                                value="{{ $user->detail_users->phone_numbers ?? '' }}"
                                class="block w-full
                                rounded-md border-0 py-1.5 text-dark dark:bg-black dark:ring-indigo-600 dark:text-indigo-200
                                shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                @endif
                <div class="mt-3 px-1">
                    <button type="submit"
                        class="inline-block rounded mt-1 bg-green-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                        Save
                    </button>
                    <a href="{{ route('profile') }}"
                        class="inline-block rounded mt-1 bg-rose-500 px-2 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-rose-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-rose-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection
