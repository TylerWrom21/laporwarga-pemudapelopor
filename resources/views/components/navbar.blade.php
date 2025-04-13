<div class="flex fixed w-full top-0 items-center justify-between py-5 px-20 bg-blue-500 text-slate-100 z-50">
    <div class="flex gap-2 items-center justify-center">
        <img class="w-12 h-12" src="asset/image/laporwarga.png" alt="LaporWarga" srcset="">
        <a href="/" class="text-2xl">LaporWarga</a>
    </div>
    <div class="flex items-center gap-5">
        <x-icon class="fa-solid fa-sun" id="theme"></x-icon>
        <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button>
        @auth
        <div class="hidden lg:block lg:flex lg:gap-5 items-center justify-center">
            <a href="/dashboard">
                {{-- <x-button>{{ Auth::user()->nama }}</x-button> --}}
                <button class="px-3 py-2 rounded-lg font-semibold text-xl transition ease-linear duration-150 hover:bg-blue-600">{{ Auth::user()->nama }}</button>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-3 py-2 rounded-lg font-semibold text-xl transition ease-linear duration-150 hover:bg-blue-600">Log out</button>
            </form>
        </div>
        @else
        <div class="gap-3">
            <a href="/login">
                <x-button>Login</x-button>
            </a>
            <a href="/registrasi">
                <x-button>Registrasi</x-button>
            </a>
        </div>
        @endauth
    </div>
</div>