@extends('templates.index')
@section('content')
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="flex flex-row justify-between mb-5 bg-slate-100 dark:bg-transparent p-3 rounded-t-xl">
                        <div class="basis-10/12">
                            <span class="text-2xl dark:text-white">List Menu</span>
                        </div>
                        <div class="basis-1/12">
                            <a href="{{ route('menu.create') }}"
                                class="block p-2 bg-black text-white dark:bg-indigo-600 text-xs text-center rounded-md shadow-lg dark:shadow-indigo-700">New
                                Menu</a>
                        </div>
                    </div>
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-indigo-600">
                            <tr>
                                <th scope="col" class="px-6 py-4 dark:text-white">#</th>
                                <th scope="col" class="px-14 py-4 dark:text-white">Name</th>
                                <th scope="col" class="px-14 py-4 dark:text-white">Route</th>
                                <th scope="col" class="py-4 dark:text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($menus as $menu)
                                <tr class="border-b dark:border-indigo-600">
                                    <td class="whitespace-nowrap  px-6 py-4 dark:text-white font-medium">
                                        {{ $loop->iteration }}</td>
                                    <td class="whitespace-nowrap font-medium px-14 py-4 dark:text-white">
                                        {{ $menu->name }}
                                    </td>
                                    <td class="whitespace-nowrap font-medium px-14 py-4 dark:text-white">
                                        {{ $menu->route }}
                                    </td>
                                    <td class="whitespace-nowrap font-medium py-4 dark:text-white">
                                        <div class="flex flex-row w-max-24">
                                            <a href="{{ route('menu.edit', $menu->id) }}"
                                                class="transition block p-2 bg-orange-500 text-white font-medium dark:bg-orange-400 text-center rounded-md scale-95 hover:shadow-lg hover:scale-100 dark:shadow-orange-300">Edit
                                                Menu</a>
                                            <a href="{{ route('menu.create') }}"
                                                class="transition block p-2 bg-rose-700 text-white font-medium dark:bg-rose-400 text-center rounded-md scale-95 hover:shadow-lg hover:scale-100 dark:shadow-rose-700">Delete
                                                Menu</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b dark:border-indigo-600">
                                    <td colspan="4"
                                        class="whitespace-nowrap text-center px-6 py-4 font-medium dark:text-white">Data
                                        Tidak Ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
