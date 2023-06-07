<!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
<nav class="bg-light dark:bg-black border-0 ring-0">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}">
                        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                            alt="Your Company">
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        {{-- navbar md >  --}}
                        @foreach ($navbar as $menu)
                            <a href="{{ route($menu->route) }}"
                                class="{{ explode('/', url()->full())[count(explode('/', url()->full())) - 1] == Str::lower($menu->name) ? 'bg-slate-600 dark:bg-indigo-600 text-white' : 'text-dark hover:bg-slate-400 hover:text-white dark:text-indigo-600 dark:hover:bg-indigo-300' }} block rounded-md px-3 py-2 text-base font-medium">{{ $menu->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div class="grid gap-2 grid-cols-2">
                            <button aria-data="change-theme" class="flex max-w-xs items-center rounded-full nus">
                                <svg class="h-8 w-8 hover:scale-95" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g id="Environment / Sun">
                                            <path id="Vector"
                                                d="M12 4V2M12 20V22M6.41421 6.41421L5 5M17.728 17.728L19.1422 19.1422M4 12H2M20 12H22M17.7285 6.41421L19.1427 5M6.4147 17.728L5.00049 19.1422M12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12C17 14.7614 14.7614 17 12 17Z"
                                                stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </g>
                                    </g>
                                </svg>
                            </button>
                            <button type="button"
                                class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                aria-controls="dropdown-navbar">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </button>
                        </div>
                        <div id="dropdown-navbar"
                            class="hidden right-0 z-10 mt-2 text-white dark:text-dark bg-white dark:bg-black w-48 origin-top-right rounded-md shadow-lg dark:shadow-lg dark:shadow-indigo-800 ring-1 ring-black dark:ring-indigo-400 ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-describedby="user-menu-button"
                            aria-labelledby="user-menu-button" tabindex="-1">
                            @forelse ($controlMenu as $menu)
                                <a href="{{ route($menu->route) }}"
                                    class="{{ explode('/', url()->full())[count(explode('/', url()->full())) - 1] == Str::lower($menu->name) ? 'text-indigo-700 dark:text-indigo-400' : 'text-black dark:text-indigo-600 hover:text-indigo-700 hover:dark:text-indigo-400' }} text-sm block px-4 py-2 rounded-t-lg"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">{{ $menu->name }}</a>
                            @empty
                                <a href="#"
                                    class="{{ explode('/', url()->full())[3] == 'profile' ? 'text-indigo-700 dark:text-indigo-400' : 'text-black dark:text-indigo-600 hover:text-indigo-700 hover:dark:text-indigo-400' }} text-sm block px-4 py-2 rounded-t-lg"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="#"
                                    class="{{ explode('/', url()->full())[3] == 'profile' ? 'text-indigo-700 dark:text-indigo-400' : 'text-black dark:text-indigo-600 hover:text-indigo-700 hover:dark:text-indigo-400' }} text-sm block px-4 py-2"
                                    role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                <a href="#"
                                    class="text-black dark:text-indigo-600 hover:text-indigo-700 hover:dark:text-indigo-400 text-sm block px-4 py-2 rounded-b-lg"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                    class="inline-flex items-center justify-center rounded-md bg-blue-700 p-2 text-white hover:bg-blue-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            @foreach ($navbar as $menu)
                <a href="{{ route($menu->route) }}"
                    class="{{ explode('/', url()->full())[count(explode('/', url()->full())) - 1] == Str::lower($menu->name) ? 'bg-slate-600 dark:bg-indigo-600 text-white' : 'text-dark hover:bg-slate-400 hover:text-white dark:text-indigo-600 dark:hover:bg-indigo-300' }} block rounded-md px-3 py-2 text-base font-medium">{{ $menu->name }}</a>
            @endforeach
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex justify-between px-6">
                <button type="button"
                    class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                    aria-controls="dropdown-navbar">
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                </button>
                <button aria-data="change-theme" class="flex max-w-xs items-center rounded-full nus">
                    <svg class="h-8 w-8 hover:scale-95" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                        </g>
                        <g id="SVGRepo_iconCarrier">
                            <g id="Environment / Sun">
                                <path id="Vector"
                                    d="M12 4V2M12 20V22M6.41421 6.41421L5 5M17.728 17.728L19.1422 19.1422M4 12H2M20 12H22M17.7285 6.41421L19.1427 5M6.4147 17.728L5.00049 19.1422M12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12C17 14.7614 14.7614 17 12 17Z"
                                    stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </g>
                        </g>
                    </svg>
                </button>
            </div>
            <div class="mt-3 space-y-1 px-2">
                @forelse ($controlMenu as $menu)
                    <a href="{{ route($menu->route) }}"
                        class="{{ explode('/', url()->full())[count(explode('/', url()->full())) - 1] == Str::lower($menu->name) ? 'text-indigo-700 dark:text-indigo-400' : 'text-black dark:text-indigo-600 hover:text-indigo-700 hover:dark:text-indigo-400' }} text-sm block px-4 py-2 rounded-t-lg"
                        role="menuitem" tabindex="-1" id="user-menu-item-0">{{ $menu->name }}</a>
                @empty
                    <a href="#"
                        class="{{ explode('/', url()->full())[3] == 'profile' ? 'text-indigo-700 dark:text-indigo-400' : 'text-black dark:text-indigo-600 hover:text-indigo-700 hover:dark:text-indigo-400' }} text-sm block px-4 py-2 rounded-t-lg"
                        role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                    <a href="#"
                        class="{{ explode('/', url()->full())[3] == 'profile' ? 'text-indigo-700 dark:text-indigo-400' : 'text-black dark:text-indigo-600 hover:text-indigo-700 hover:dark:text-indigo-400' }} text-sm block px-4 py-2"
                        role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                    <a href="#"
                        class="text-black dark:text-indigo-600 hover:text-indigo-700 hover:dark:text-indigo-400 text-sm block px-4 py-2 rounded-b-lg"
                        role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                @endforelse
            </div>
        </div>
    </div>
</nav>
