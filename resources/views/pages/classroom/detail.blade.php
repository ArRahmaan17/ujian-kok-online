@extends('templates.index')
@section('css')
@endsection
@section('content')
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-2xl leading-7 text-gray-900 truncate dark:text-indigo-400">Class
                {{ $classroom->name }} Information</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500 dark:text-indigo-200">Class details and application.</p>
        </div>
        <div class="mt-6 border-t border-gray-100 dark:border-indigo-800">
            <dl class="divide-y divide-gray-100 dark:divide-indigo-800">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm leading-6 text-gray-900 dark:text-indigo-400">Class name</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 dark:text-indigo-200 sm:col-span-2 sm:mt-0">
                        {{ $classroom->name }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm leading-6 text-gray-900 dark:text-indigo-400">Homeroom Teacher</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 dark:text-indigo-200 sm:col-span-2 sm:mt-0">
                        {{ $classroom->homeroom->full_name }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm leading-6 text-gray-900 dark:text-indigo-400">Student Count</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 dark:text-indigo-200 sm:col-span-2 sm:mt-0">
                        {{ count($students) }} / <span class="text-slate-400">{{ $classroom->total_students }}</span>
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm leading-6 text-gray-900 dark:text-indigo-400">Students</dt>
                    <dd class="mt-2 text-sm text-gray-900 dark:text-indigo-400 sm:col-span-2 sm:mt-0">
                        <ul role="list"
                            class="divide-y divide-gray-100 dark:divide-indigo-800 rounded-md border border-gray-200 dark:border-indigo-800 max-h-64 overflow-y-auto">
                            @forelse ($students as $student)
                                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                    <a href="#" class="w-0 flex-1 items-center inline-flex">
                                        <svg class="fill-black dark:fill-indigo-300" xmlns="http://www.w3.org/2000/svg"
                                            width="30px" height="30px" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16.5 7.063C16.5 10.258 14.57 13 12 13c-2.572 0-4.5-2.742-4.5-5.938C7.5 3.868 9.16 2 12 2s4.5 1.867 4.5 5.063zM4.102 20.142C4.487 20.6 6.145 22 12 22c5.855 0 7.512-1.4 7.898-1.857a.416.416 0 0 0 .09-.317C19.9 18.944 19.106 15 12 15s-7.9 3.944-7.989 4.826a.416.416 0 0 0 .091.317z" />
                                        </svg>
                                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                            <span class="truncate">{{ $student->full_name }}</span>
                                            <span
                                                class="flex-shrink-0 text-gray-400 dark:text-indigo-200 hidden md:inline text-xs self-center">
                                                {{ $student->student_identification_number }}
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
@endsection
@section('script')
@endsection
