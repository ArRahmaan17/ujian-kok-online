<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
<header class="bg-gradient-to-b from-transparent via-slate-700 dark:from-black to-slate-900 dark:to-indigo-600">
    <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8 grid grid-cols-2 grid-flow-col gap-4">
        <div class="text-3xl tracking-tight text-white col-span-2 capitalize place-self-start p-2">
            {{ displayRouteName(request()->route()->getname()) }}
        </div>
        <div class="hidden sm:block text-2xl  tracking-tight text-slate-200/60 place-self-end capitalize">
            {{ auth()->user()->detail_users->full_name ?? 'Developer Mode' }} / {{ auth()->user()->username }}
        </div>
    </div>
</header>
<span class="block h-20 bg-gradient-to-b from-slate-900 dark:from-indigo-600 via-slate-700 to-transparent"></span>
