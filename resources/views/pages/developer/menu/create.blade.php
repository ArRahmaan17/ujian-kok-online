@extends('templates.index')
@section('content')
    @if (count($errors) > 0)
        <div class="flex flex-col bg-rose-500 text-white rounded-md mb-4">
            <div class="p-3 text-2xl">Error Lists</div>
            <hr>
            @foreach ($errors->all() as $error)
                <div class="basis-full p-3 text-lg">{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form class="px-8 sm:px-0" action="{{ route('menu.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-2xl font-semibold leading-7 text-dark dark:text-indigo-600 capitalize">create menu
                </h2>
                <p class="mt-1 text-md leading-6 text-gray-600 dark:text-indigo-300 capitalize">
                    control the direction of your app's destination
                </p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="name"
                            class="block text-sm font-medium leading-6 text-dark dark:text-indigo-600 capitalize">menu
                            name</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="name"
                                class="block w-full rounded-md border-0 py-1.5 text-dark dark:bg-black dark:ring-indigo-600 dark:text-indigo-200 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <span class="text-sm text-rose-500">* The name of the menu to be displayed on the web
                                page</span>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="route"
                            class="block text-sm font-medium leading-6 text-dark dark:text-indigo-600">Route Name</label>
                        <div class="mt-2">
                            <input type="text" name="route" id="route" autocomplete="family-name"
                                class="block w-full rounded-md border-0 py-1.5 text-dark dark:bg-black dark:ring-indigo-600 dark:text-indigo-200 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <span class="text-sm text-rose-500">* Route name on <code
                                    class="bg-slate-400 text-white rounded-md p-1">web.php/api.php</code>
                            </span>
                            <div class="hidden absolute right-100 z-10 mt-2 w-max-auto origin-top-right rounded-md bg-white dark:bg-black dark:shadow-indigo-800 shadow-lg ring-1 ring-black dark:ring-indigo-500 ring-opacity-5 focus:outline-none"
                                aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    @foreach ($routes as $route)
                                        <div class="text-black block px-4 py-2 text-sm cursor-pointer dark:text-indigo-600 hover:dark:text-indigo-300 hover:text-slate-500 list-route"
                                            data-route="{{ $route->action['as'] }}" tabindex="-1">
                                            {{ $route->action['as'] }}
                                            <span
                                                class="text-xs text-slate-500 dark:text-indigo-300">{{ $route->uri }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="position"
                            class="block text-sm font-medium leading-6 text-dark dark:text-indigo-600 capitalize">menu
                            position</label>
                        <div class="mt-2">
                            <select id="position" name="position"
                                class="block w-full rounded-md border-0 py-1.5 text-dark dark:text-indigo-600 dark:ring-indigo-600  dark:bg-black shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="navbar">Navbar</option>
                                <option value="control-menu">Control Menu</option>
                            </select>
                            <span class="text-sm text-rose-500 ">* Menu position on the web page</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-2xl font-semibold leading-7 text-dark dark:text-indigo-600 capitalize">Role management</h2>
                <p class="mt-1 text-md leading-6 text-gray-600 dark:text-indigo-300 capitalize">
                    take control your user flow in your application
                </p>

                <div class="mt-10 space-y-10">
                    <fieldset>
                        <legend class="text-sm font-semibold leading-6 text-dark dark:text-indigo-600">By Role</legend>
                        <div class="mt-6 space-y-6">
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="developer" name="for_developer" type="checkbox" checked value="true"
                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div class="text-sm leading-6">
                                    <label for="developeruseRoute"
                                        class="font-medium text-dark dark:text-indigo-600">Developer</label>
                                </div>
                            </div>
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="teacher" name="for_teacher" type="checkbox" value="true"
                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div class="text-sm leading-6">
                                    <label for="teacher" class="font-medium text-dark dark:text-indigo-600">Teacher</label>
                                </div>
                            </div>
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="student" name="for_student" type="checkbox" value="true"
                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div class="text-sm leading-6">
                                    <label for="student" class="font-medium text-dark dark:text-indigo-600">Student</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-sm font-semibold leading-6 text-dark dark:text-indigo-600">On Maintenance
                        </legend>
                        <p class="mt-1 text-sm leading-6 text-gray-600">These are condition on your menu
                        </p>
                        <div class="mt-6 space-y-6">
                            <div class="flex items-center gap-x-3">
                                <input id="maintenance" name="maintenance" type="radio" value="true"
                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                <label for="maintenance"
                                    class="block text-sm font-medium leading-6 text-dark dark:text-indigo-600">Yes</label>
                            </div>
                            <div class="flex items-center gap-x-3">
                                <input id="not-maintenance" name="maintenance" type="radio" checked value="false"
                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                <label for="not-maintenance"
                                    class="block text-sm font-medium leading-6 text-dark dark:text-indigo-600">No</label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a type="button" class="text-sm font-semibold leading-6 text-dark dark:text-indigo-600"
                href="{{ route('menu.index') }}">Cancel</a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#route").focus(function() {
                $($(this).siblings()[1]).removeClass('hidden');
            });
            $("#route").blur(function() {
                $($(this).siblings()[1]).addClass('hidden');
            });
            $('.list-route').hover(function() {
                $("#route").val($(this).data('route'));
            });
        });

        function useRoute(container) {
            console.log(container)
        }
    </script>
@endsection
