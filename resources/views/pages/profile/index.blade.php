@extends('templates.index')
@section('content')
    <div class="flex flex-col md:flex-row shadow-xl rounded-sm gap-3 py-3 ">
        <div
            class="basis-1/2 p-3  grid grid-cols-1 border-b-[1px] md:border-b-0 md:border-r-[1px] border-slate-200 dark:border-indigo-600 ">
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
                    <input readonly type="text" name="full_name" id="full_name"
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
                        <input readonly type="text" name="phone_numbers" id="phone_numbers"
                            value="{{ $user->detail_users->phone_numbers ?? '' }}"
                            class="block w-full
                                rounded-md border-0 py-1.5 text-dark dark:bg-black dark:ring-indigo-600 dark:text-indigo-200
                                shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            @endif
            <div class="mt-3 px-1">
                <a href="{{ route('profile.edit', $user->id) }}"
                    class="inline-block rounded bg-orange-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b] transition duration-150 ease-in-out hover:bg-orange-600 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:bg-orange-600 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:outline-none focus:ring-0 active:bg-orange-700 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]">
                    Edit
                </a>
                <button type="button"
                    class="inline-block rounded bg-rose-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                    Request Change Password
                </button>
            </div>
        </div>
        <div class="basis-1/2 px-3 max-h-[53vh] overflow-y-auto">
            <div class="sticky top-0 text-center bg-slate-50/70 p-5 opacity-75">Log Proccess</div>
            <div class="mb-3 inline-flex w-full items-center rounded-lg bg-violet-100 px-6 py-5 text-base text-violet-700"
                role="alert">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                A simple primary alert - check it out!
            </div>
            <div class="mb-3 inline-flex w-full items-center rounded-lg bg-gray-100 px-6 py-5 text-base text-gray-800"
                role="alert">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                A simple secondary alert - check it out!
            </div>
            <div class="mb-3 inline-flex w-full items-center rounded-lg bg-green-100 px-6 py-5 text-base text-green-700"
                role="alert">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                A simple success alert - check it out!
            </div>
            <div class="mb-3 inline-flex w-full items-center rounded-lg bg-red-100 px-6 py-5 text-base text-red-700"
                role="alert">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                A simple danger alert - check it out!
            </div>
            <div class="mb-3 inline-flex w-full items-center rounded-lg bg-orange-100 px-6 py-5 text-base text-orange-800"
                role="alert">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                A simple warning alert - check it out!
            </div>
            <div class="mb-3 inline-flex w-full items-center rounded-lg bg-blue-100 px-6 py-5 text-base text-blue-800"
                role="alert">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                A simple indigo alert - check it out!
            </div>
            <div class="mb-3 inline-flex w-full items-center rounded-lg bg-neutral-50 px-6 py-5 text-base text-neutral-600"
                role="alert">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path d="M8.25 10.875a2.625 2.625 0 115.25 0 2.625 2.625 0 01-5.25 0z" />
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.125 4.5a4.125 4.125 0 102.338 7.524l2.007 2.006a.75.75 0 101.06-1.06l-2.006-2.007a4.125 4.125 0 00-3.399-6.463z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                A simple light alert - check it out!
            </div>
            <div class="mb-3 inline-flex w-full items-center rounded-lg bg-neutral-800 px-6 py-5 text-base text-neutral-50 dark:bg-neutral-900"
                role="alert">
                <span class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                A simple dark alert - check it out!
            </div>
        </div>
    </div>
@endsection
