@extends('templates.index')
@section('content')
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="flex flex-row justify-between mb-5 p-3 rounded-t-xl">
                <div class="basis-10/12">
                    <span class="text-2xl dark:text-white">List Menu</span>
                </div>
                <div class="basis-1/12">
                    <a href="{{ route('menu.create') }}"
                        class="block p-2 bg-black text-white dark:bg-indigo-600 text-xs text-center rounded-md shadow-lg dark:shadow-indigo-700">New
                        Menu</a>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6 p-3">
                <div class="shadow-xl p-3 rounded-md ">
                    <ul role="list" id="navbar" class="divide-y divide-gray-100 overflow-auto max-h-[55vh]">
                        @foreach ($navbarMenu as $menu)
                            <li class="flex justify-between gap-x-6 py-5" data-id={{ $menu->id }}
                                data-name={{ $menu->name }} data-ordered={{ $menu->ordered }}>
                                <div class="flex gap-x-4 items-center">
                                    <div
                                        class="transition-all h-12 w-12 flex-none rounded-full bg-gray-50 dark:bg-indigo-50 scale-95 hover:scale-90 mx-auto text-center py-3">
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
                                    <p class="text-sm leading-6 text-gray-900">
                                        {{ $menu->updated_at != null ? Carbon\Carbon::parseFromLocale($menu->updated_at, 'en', 'Asia/Jakarta')->diffForHumans() : 'Not Updated Yet' }}
                                    </p>
                                    <p class="mt-1 text-xs leading-5 text-gray-500 capitalize">Created
                                        {{ Carbon\Carbon::parseFromLocale($menu->created_at, 'en', 'Asia/Jakarta')->diffForHumans() }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="shadow-xl p-3 rounded-md">
                    <ul role="list" id="control-menu" class="divide-y divide-gray-100 overflow-auto max-h-[55vh]">
                        @foreach ($controlMenu as $menu)
                            <li class="flex justify-between gap-x-6 py-5">
                                <div class="flex gap-x-4 items-center">
                                    <div class="h-12 w-12 flex-none rounded-full bg-gray-50 mx-auto text-center py-3">
                                        {{ $loop->iteration }}
                                    </div>
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $menu->name }}</p>
                                        <p class="mt-1 truncate text-xs md:text-sm leading-5 flex flex-wrap gap-3 md:block">
                                            <span
                                                class="inline-block whitespace-nowrap rounded-[0.27rem] {{ $menu->for_developer ? 'bg-green-100 text-green-800' : 'bg-rose-200 text-rose-800' }} px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                                Programmer <i class="fa-solid fa-check"></i>
                                            </span>
                                            <span
                                                class="inline-block whitespace-nowrap rounded-[0.27rem] {{ $menu->for_teacher ? 'bg-green-100 text-green-800' : 'bg-rose-200 text-rose-800' }} px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                                Teacher <i class="fa-solid fa-check"></i>
                                            </span>
                                            <span
                                                class="inline-block whitespace-nowrap rounded-[0.27rem] {{ $menu->for_student ? 'bg-green-100 text-green-800' : 'bg-rose-200 text-rose-800' }} px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none">
                                                Student <i class="fa-solid fa-check"></i>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="hidden xl:flex xl:flex-col xl:items-end">
                                    <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
                                    <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time
                                            datetime="2023-01-23T13:23Z">3h
                                            ago</time></p>
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
        dragula([document.getElementById('navbar'), document.getElementById('control-menu')])
            .on('drag', function(el) {
                el.className = el.className.replace('ex-moved', '');
            }).on('drop', debounce(function(el) {
                let navbar = [];
                let control = [];
                $("#navbar").find(el.localName).map(function(index, list) {
                    $(list).find('.transition-all.text-center').html(index + 1);
                    $(list).data('ordered', index + 1);
                    navbar.push($(list).data())
                });
                $("#control-menu").find(el.localName).map(function(index, list) {
                    $(list).data('ordered', index + 1);
                    control.push($(list).data())
                    $(list).find('.transition-all.text-center').html(index + 1)
                });
                orderingMenu(navbar).then(() => {
                    orderingMenu(control);
                });
                el.className += ' ex-moved';
            }, 1000)).on('over', function(el, container) {
                container.className += ' ex-over';
            }).on('out', function(el, container) {
                container.className = container.className.replace('ex-over', '');
            });

        function orderingMenu(data) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    type: "PUT",
                    url: "{{ route('menu.update', 1) }}",
                    data: {
                        menus: data
                    },
                    dataType: "json",
                    success: function(response) {

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
    </script>
@endsection
