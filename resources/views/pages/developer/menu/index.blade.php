@extends('templates.index')
@section('content')
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:mx-6 lg:mx-8 mb-10">
            <div class="flex flex-row justify-between mb-5 p-3 rounded-t-xl ">
                <div class="basis-3/4 xl:basis-10/12">
                    <span class="text-2xl dark:text-white">List Menu</span>
                </div>
                <div class="basis-3/12 xl:basis-1/12">
                    <a href="{{ route('menu.create') }}"
                        class="block p-2 bg-black text-white dark:bg-indigo-600 text-xs text-center rounded-md shadow-lg dark:shadow-indigo-700">New
                        Menu</a>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 p-3">
                <div class="ring-1 ring-offset-transparent ring-offset-1 ring-slate-400 dark:ring-indigo-400 rounded px-2">
                    <ul role="list" id="navbar"
                        class="divide-y divide-gray-100 dark:divide-indigo-400 overflow-auto max-h-[55vh]">
                        @foreach ($navbarMenu as $menu)
                            <li class="flex justify-between gap-x-6 py-5" data-id={{ $menu->id }}
                                data-name={{ $menu->name }} data-ordered={{ $menu->ordered }}
                                data-position={{ $menu->position }}>
                                <div class="flex gap-x-4 items-center">
                                    <div
                                        class="transition-all h-12 w-12 flex-none rounded-full bg-gray-50 dark:bg-indigo-600 dark:text-white scale-95 hover:dark:ring-2 hover:dark:ring-indigo-400 dark:hover:ring-offset-1 hover:scale-90 mx-auto text-center py-3">
                                        {{ $loop->iteration }}
                                    </div>
                                    <div class="min-w-0 flex-auto">
                                        <a href="{{ route('menu.edit', $menu->id) }}">
                                            <p
                                                class="text-sm font-semibold leading-6 text-black hover:text-slate-400 dark:text-indigo-400 dark:hover:text-indigo-600">
                                                {{ $menu->name }}
                                            </p>
                                        </a>
                                        <p class="mt-1 truncate text-xs md:text-sm leading-5 flex flex-wrap gap-3 md:block">
                                            <span
                                                class="inline-block whitespace-nowrap rounded-[0.27rem] {{ $menu->for_developer ? 'bg-green-100 text-green-800 dark:bg-green-300' : 'bg-rose-100 text-rose-800 dark:bg-rose-300' }} px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                                Programmer @if ($menu->for_developer)
                                                    <i class="fa-solid fa-check"></i>
                                                @else
                                                    <i class="fa-solid fa-xmark"></i>
                                                @endif
                                            </span>
                                            <span
                                                class="inline-block whitespace-nowrap rounded-[0.27rem] {{ $menu->for_teacher ? 'bg-green-100 text-green-800 dark:bg-green-300' : 'bg-rose-100 text-rose-800 dark:bg-rose-300' }} px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                                Teacher @if ($menu->for_teacher)
                                                    <i class="fa-solid fa-check"></i>
                                                @else
                                                    <i class="fa-solid fa-xmark"></i>
                                                @endif
                                            </span>
                                            <span
                                                class="inline-block whitespace-nowrap rounded-[0.27rem] {{ $menu->for_student ? 'bg-green-100 text-green-800 dark:bg-green-300' : 'bg-rose-100 text-rose-800 dark:bg-rose-300' }} px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                                Student @if ($menu->for_student)
                                                    <i class="fa-solid fa-check"></i>
                                                @else
                                                    <i class="fa-solid fa-xmark"></i>
                                                @endif
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="hidden xl:flex xl:flex-col xl:items-end">
                                    <p class="text-sm leading-6 text-gray-900 dark:text-indigo-400">
                                        {{ $menu->updated_at != null? Carbon\Carbon::parse($menu->updated_at)->add(-7, 'hours')->diffForHumans(): 'Not Updated Yet' }}
                                    </p>
                                    <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-indigo-300 capitalize">Created
                                        {{ convertDateTimeToDiff($menu->created_at) }}
                                        by {{ $menu->user->username }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="ring-1 ring-offset-transparent ring-offset-1 ring-slate-400 dark:ring-indigo-400 rounded px-2">
                    <ul role="list" id="control-menu"
                        class="divide-y divide-gray-100 dark:divide-indigo-400  overflow-auto max-h-[55vh]">
                        @foreach ($controlMenu as $menu)
                            <li class="flex justify-between gap-x-6 py-5" data-id={{ $menu->id }}
                                data-name={{ $menu->name }} data-ordered={{ $menu->ordered }}
                                data-position={{ $menu->position }}>
                                <div class="flex gap-x-4 items-center">
                                    <div
                                        class="transition-all h-12 w-12 flex-none rounded-full bg-gray-50 dark:bg-indigo-600 dark:text-white scale-95 hover:scale-90 mx-auto text-center py-3 hover:dark:ring-2 hover:dark:ring-indigo-400 dark:hover:ring-offset-1">
                                        {{ $loop->iteration }}
                                    </div>
                                    <div class="min-w-0 flex-auto">
                                        <a href="{{ route('menu.edit', $menu->id) }}">
                                            <p
                                                class="text-sm font-semibold leading-6 text-black hover:text-slate-400 dark:text-indigo-400 dark:hover:text-indigo-600">
                                                {{ $menu->name }}
                                            </p>
                                        </a>
                                        <p class="mt-1 truncate text-xs md:text-sm leading-5 flex flex-wrap gap-3 md:block">
                                            <span
                                                class="inline-block whitespace-nowrap rounded-[0.27rem] {{ $menu->for_developer ? 'bg-green-100 text-green-800 dark:bg-green-300' : 'bg-rose-100 text-rose-800 dark:bg-rose-300' }} px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                                Programmer @if ($menu->for_developer)
                                                    <i class="fa-solid fa-check"></i>
                                                @else
                                                    <i class="fa-solid fa-xmark"></i>
                                                @endif
                                            </span>
                                            <span
                                                class="inline-block whitespace-nowrap rounded-[0.27rem] {{ $menu->for_teacher ? 'bg-green-100 text-green-800 dark:bg-green-300' : 'bg-rose-100 text-rose-800 dark:bg-rose-300' }} px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                                Teacher @if ($menu->for_teacher)
                                                    <i class="fa-solid fa-check"></i>
                                                @else
                                                    <i class="fa-solid fa-xmark"></i>
                                                @endif
                                            </span>
                                            <span
                                                class="inline-block whitespace-nowrap rounded-[0.27rem] {{ $menu->for_student ? 'bg-green-100 text-green-800 dark:bg-green-300' : 'bg-rose-100 text-rose-800 dark:bg-rose-300' }} px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                                Student @if ($menu->for_student)
                                                    <i class="fa-solid fa-check"></i>
                                                @else
                                                    <i class="fa-solid fa-xmark"></i>
                                                @endif
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="hidden xl:flex xl:flex-col xl:items-end">
                                    <p class="text-sm leading-6 text-gray-900 dark:text-indigo-400">
                                        {{ $menu->updated_at != null? Carbon\Carbon::parse($menu->updated_at)->add(-7, 'hours')->diffForHumans(): 'Not Updated Yet' }}
                                    </p>
                                    <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-indigo-300 capitalize">Created
                                        {{ convertDateTimeToDiff($menu->created_at) }}
                                        by {{ $menu->user->username }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.3/dragula.min.js'></script>
    <script>
        initializeDragulaJs();

        function initializeDragulaJs() {
            dragula([document.getElementById('navbar'), document.getElementById('control-menu')])
                .on('drag', function(el) {
                    el.className = el.className.replace('ex-moved', '');
                }).on('drop', debounce(function(el) {
                    let navbar = [];
                    let control = [];
                    $("#navbar").find(el.localName).map(function(index, list) {
                        $(list).find('.transition-all.text-center').html(index + 1);
                        $(list).data('ordered', index + 1);
                        $(list).data('position', 'navbar');
                        navbar.push($(list).data())
                    });
                    $("#control-menu").find(el.localName).map(function(index, list) {
                        $(list).data('ordered', index + 1);
                        $(list).data('position', 'control-menu');
                        control.push($(list).data())
                        $(list).find('.transition-all.text-center').html(index + 1)
                    });
                    orderingMenu(navbar, control);
                    el.className += ' ex-moved';
                }, 1000)).on('over', function(el, container) {
                    container.className += ' ex-over';
                }).on('out', function(el, container) {
                    container.className = container.className.replace('ex-over', '');
                });
        }

        function orderingMenu(navbar, control) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    type: "PUT",
                    url: "{{ route('menu.order') }}",
                    data: {
                        _token: `{{ csrf_token() }}`,
                        navbar: navbar,
                        control: control,
                    },
                    dataType: "json",
                    success: function({
                        message,
                        data
                    }) {
                        buildResponseMenu(data);
                        initializeDragulaJs()
                        resolve(true);
                    },
                    error: function({
                        message,
                        data
                    }) {
                        buildResponseMenu(data);
                        initializeDragulaJs();
                        reject(true);
                    }
                });
            });
        }

        function debounce(func, delay) {
            let timerId;

            return function(...args) {
                clearTimeout(timerId);

                timerId = setTimeout(() => {
                    func.apply(this, args);
                }, delay);
            };
        }

        function buildResponseMenu(data) {
            let html = ``;
            data.navbar.forEach((menu, index) => {
                html += `<li class="flex justify-between gap-x-6 py-5" data-id="${menu.id}" data-name="${menu.name}" data-ordered="${menu.ordered}" data-position="${menu.position}">
                    <div class="flex gap-x-4 items-center">
                        <div
                            class="transition-all h-12 w-12 flex-none rounded-full bg-gray-50 dark:bg-indigo-600 dark:text-white scale-95 hover:scale-90 mx-auto text-center py-3 hover:dark:ring-2 hover:dark:ring-indigo-400 dark:hover:ring-offset-1">
                            ${index+1}
                        </div>
                        <div class="min-w-0 flex-auto">
                            <a href="{{ url('developer/menu') }}/${menu.id}/edit">
                                <p
                                    class="text-sm font-semibold leading-6 text-black hover:text-slate-400 dark:text-indigo-400 dark:hover:text-indigo-600">
                                    ${menu.name}
                                </p>
                            </a>
                            <p class="mt-1 truncate text-xs md:text-sm leading-5 flex flex-wrap gap-3 md:block">
                                <span
                                    class="inline-block whitespace-nowrap rounded-[0.27rem] ${(menu.for_developer) ? 'bg-green-100 text-green-800 dark:bg-green-300': 'bg-rose-100 text-rose-800 dark:bg-rose-300' } px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                    Programmer ${(menu.for_developer) ? '<i class="fa-solid fa-check"></i>': '<i class="fa-solid fa-xmark"></i>' }
                                </span>
                                <span
                                    class="inline-block whitespace-nowrap rounded-[0.27rem] ${(menu.for_teacher) ? 'bg-green-100 text-green-800 dark:bg-green-300': 'bg-rose-100 text-rose-800 dark:bg-rose-300' } px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                    Teacher ${(menu.for_teacher) ? '<i class="fa-solid fa-check"></i>': '<i class="fa-solid fa-xmark"></i>' }
                                </span>
                                <span
                                    class="inline-block whitespace-nowrap rounded-[0.27rem] ${(menu.for_student) ? 'bg-green-100 text-green-800 dark:bg-green-300': 'bg-rose-100 text-rose-800 dark:bg-rose-300' } px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                    Student ${(menu.for_student) ? '<i class="fa-solid fa-check"></i>': '<i class="fa-solid fa-xmark"></i>' }
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="hidden xl:flex xl:flex-col xl:items-end">
                        <p class="text-sm leading-6 text-gray-900 dark:text-indigo-400">
                            ${(menu.updated_at != null) ? moment(menu.updated_at).add(-7, 'hours').fromNow(): 'Not Updated Yet' }
                        </p>
                        <p class="mt-1 text-xs leading-5 text-gray-500 capitalize dark:text-indigo-300">Created
                            ${moment(menu.created_at).add(-7, 'hours').fromNow()} by ${menu.user.username}
                        </p>
                    </div>
                </li>`;
            });
            $("#navbar").html(html);
            html = '';
            data.control.forEach((menu, index) => {
                html += `<li class="flex justify-between gap-x-6 py-5" data-id="${menu.id}" data-name="${menu.name}" data-ordered="${menu.ordered}" data-position="${menu.position}">
                    <div class="flex gap-x-4 items-center">
                        <div
                            class="transition-all h-12 w-12 flex-none rounded-full bg-gray-50 dark:bg-indigo-600 dark:text-white scale-95 hover:scale-90 mx-auto text-center py-3 hover:dark:ring-2 hover:dark:ring-indigo-400 dark:hover:ring-offset-1">
                            ${index+1}
                        </div>
                        <div class="min-w-0 flex-auto">
                            <a href="{{ url('developer/menu') }}/${menu.id}/edit">
                                <p
                                    class="text-sm font-semibold leading-6 text-black hover:text-slate-400 dark:text-indigo-400 dark:hover:text-indigo-600">
                                    ${menu.name}
                                </p>
                            </a>
                            <p class="mt-1 truncate text-xs md:text-sm leading-5 flex flex-wrap gap-3 md:block">
                                <span
                                    class="inline-block whitespace-nowrap rounded-[0.27rem] ${(menu.for_developer) ? 'bg-green-100 text-green-800 dark:bg-green-300': 'bg-rose-100 text-rose-800 dark:bg-rose-300' } px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                    Programmer ${(menu.for_developer) ? '<i class="fa-solid fa-check"></i>': '<i class="fa-solid fa-xmark"></i>' }
                                </span>
                                <span
                                    class="inline-block whitespace-nowrap rounded-[0.27rem] ${(menu.for_teacher) ? 'bg-green-100 text-green-800 dark:bg-green-300': 'bg-rose-100 text-rose-800 dark:bg-rose-300' } px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                    Teacher ${(menu.for_teacher) ? '<i class="fa-solid fa-check"></i>': '<i class="fa-solid fa-xmark"></i>' }
                                </span>
                                <span
                                    class="inline-block whitespace-nowrap rounded-[0.27rem] ${(menu.for_student) ? 'bg-green-100 text-green-800 dark:bg-green-300': 'bg-rose-100 text-rose-800 dark:bg-rose-300' } px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                    Student ${(menu.for_student) ? '<i class="fa-solid fa-check"></i>': '<i class="fa-solid fa-xmark"></i>' }
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="hidden xl:flex xl:flex-col xl:items-end">
                        <p class="text-sm leading-6 text-gray-900 dark:text-indigo-400">
                            ${(menu.updated_at != null) ? moment(menu.updated_at).add(-7, 'hours').fromNow(): 'Not Updated Yet' }
                        </p>
                        <p class="mt-1 text-xs leading-5 text-gray-500 capitalize dark:text-indigo-300">Created
                            ${moment(menu.created_at).add(-7, 'hours').fromNow()} by ${menu.user.username}
                        </p>
                    </div>
                </li>`;
            });
            $("#control-menu").html(html);
            html = '';
        }
    </script>
@endsection
