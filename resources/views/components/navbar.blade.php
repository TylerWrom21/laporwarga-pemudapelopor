<div class="flex fixed w-full top-0 items-center justify-between py-5 px-20 bg-blue-500 text-slate-100 z-50">
    <div class="flex gap-2 items-center justify-center">
        <img class="w-12 h-12" src="{{ asset('asset/image/laporwarga.png') }}" alt="LaporWarga" srcset="">
        <a href="/" class="text-2xl">LaporWarga</a>
    </div>
    <div class="flex items-center gap-5">
        <x-icon class="fa-solid fa-sun" id="theme"></x-icon>
        <button id="sidebarToggle" type="button" class="sm:hidden">
            <x-icon class="fa-solid fa-bars"></x-icon>
        </button>
        @auth
        <div class="hidden sm:block sm:flex sm:gap-5 items-center justify-center">
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
        <div class="gap-3 hidden sm:block">
            <a href="/login">
                <button class="px-3 py-2 rounded-lg font-semibold text-xl transition ease-linear duration-150 hover:bg-blue-600">Login</button>
            </a>
            <a href="/registrasi">
                <button class="px-3 py-2 rounded-lg font-semibold text-xl transition ease-linear duration-150 hover:bg-blue-600">Registrasi</button>
            </a>
        </div>
        @endauth
    </div>
</div>