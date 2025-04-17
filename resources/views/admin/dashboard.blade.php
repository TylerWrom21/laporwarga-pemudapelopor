<x-app-layout class="mt-14">
    <main class="flex-1 overflow-y-auto">
        <div class="container px-4 py-8 mx-auto">
            <h2 class="mb-6 text-2xl font-semibold text-gray-800 dark:text-gray-200">Selamat Datang di Dashboard Admin LaporWarga</h2>

            <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2 lg:grid-cols-3">
                <div class="flex items-center justify-between p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div>
                        <h3 class="text-sm text-gray-600 dark:text-gray-400">Total Laporan</h3>
                        <p class="text-xl font-semibold text-indigo-500 dark:text-indigo-400">{{ $total_laporan }}</p>
                    </div>
                    <i class="text-3xl text-indigo-500 dark:text-indigo-400 fas fa-file-alt"></i>
                </div>
                <div class="flex items-center justify-between p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div>
                        <h3 class="text-sm text-gray-600 dark:text-gray-400">Laporan Baru</h3>
                        <p class="text-xl font-semibold text-green-500 dark:text-green-400">
                            {{ $total_laporan_baru }}
                        </p>
                    </div>
                    <i class="text-3xl text-green-500 dark:text-green-400 fas fa-plus-circle"></i>
                </div>
                <div class="flex items-center justify-between p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div>
                        <h3 class="text-sm text-gray-600 dark:text-gray-400">Pengguna Terdaftar</h3>
                        <p class="text-xl font-semibold text-blue-500 dark:text-blue-400">{{ $pengguna }}</p>
                    </div>
                    <i class="text-3xl text-blue-500 dark:text-blue-400 fas fa-users"></i>
                </div>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-300">Laporan Terbaru</h3>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        @if($laporan_terbaru->count() > 0)
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 font-semibold text-left text-gray-600 uppercase dark:text-gray-300">#</th>
                                    <th class="px-4 py-2 font-semibold text-left text-gray-600 uppercase dark:text-gray-300">Judul</th>
                                    <th class="px-4 py-2 font-semibold text-left text-gray-600 uppercase dark:text-gray-300">Status</th>
                                    <th class="px-4 py-2 font-semibold text-left text-gray-600 uppercase dark:text-gray-300">Tanggal</th>
                                    <th class="px-4 py-2 font-semibold text-left text-gray-600 uppercase dark:text-gray-300">Aksi</th>
                                </tr>
                            </thead>
                        @endif
                        <tbody class="text-gray-700 dark:text-gray-300">
                            @forelse ($laporan_terbaru as $item)
                                <tr class="border-t border-gray-200 dark:border-gray-700">
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $item->judul }}</td>
                                    <td class="px-4 py-2">{{ $item->status }}</td>
                                    <td class="px-4 py-2">
                                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y H:i') }}
                                    </td>

                                    <td class="px-4 py-2">
                                        <form action="{{ route('admin.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">Tidak ada laporan terbaru
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($laporan_terbaru->count() > 5)
                    <a href="#" class="block mt-4 text-center text-blue-500 hover:text-indigo-700 dark:text-blue-400 dark:hover:text-blue-300">Lihat Semua Laporan</a>
                @endif
                
            </div>
        </div>
    </main>
</x-app-layout>