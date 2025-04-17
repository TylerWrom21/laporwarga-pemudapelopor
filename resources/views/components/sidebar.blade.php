{{-- <aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar"> --}}
    <aside id="sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform duration-300 ease-in-out transform -translate-x-full bg-gray-50 dark:bg-gray-800 sm:translate-x-0"
        aria-label="Sidebar">
        <div class="flex flex-col h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="mt-20 space-y-2 font-medium">
                <li>
                    <a href="/dashboard"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fa-solid fa-home"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="/inbox"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fa-solid fa-envelope"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Pesan masuk</span>
                        {{-- <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full ms-3 dark:bg-blue-900 dark:text-blue-300">3</span>
                        --}}
                    </a>
                </li>
                <li>
                    <a href="/aspirasi"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fa-solid fa-newspaper"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Aspirasi</span>
                    </a>
                </li>
            </ul>
            <div class="mt-auto">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <a
                            class="flex items-center text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="flex-1 inline-block ms-3 whitespace-nowrap">Log out</span>
                        </a>
                    </button>
                </form>
            </div>
        </div>
    </aside>