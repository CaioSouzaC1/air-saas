<x-layouts.app>

    <p class="text-center">Welcome back: <span class="font-semibold"> {{ Auth::user()->email ?? Auth::user()->name ??''
            }} </span></p>
    <p class="text-center">You are logged in as: <span class="font-semibold"> {{ Auth::user()->type ?? '' }} </span></p>

</x-layouts.app>