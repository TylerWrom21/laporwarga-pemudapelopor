{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Berhasil Login") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout class="mt-20">

  <div class="flex w-full justify-between p-5">
    <h1 class="text-lg font-semibold dark:text-gray-100">Masyarakat</h1>
  </div>
  <div class="relative overflow-x-auto sm:rounded-lg border border-gray-300 dark:border-gray-700 shadow-sm">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-100 border-b border-gray-300 dark:border-gray-700">
              <tr>
                  <th scope="col" class="px-6 py-3 text-center">
                      Nama
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                      Email
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                      <div class="flex items-center">
                          Tanggal
                          {{-- <a href="#"><i class="fa-solid fa-caret-down"></i></a> --}}
                      </div>
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                      Aksi
                  </th>
              </tr>
          </thead>
          <tbody>
              @foreach ($masyarakats as $masyarakat)
                      <tr class="text-sm font-semibold text-gray-700 dark:text-gray-100 border-t border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                          {{-- <td class="px-4 py-2">{{ $loop->iteration }}</td> --}}
                          <td class="px-4 py-2">{{ $masyarakat->nama }}</td>
                          <td class="px-4 py-2">{{ $masyarakat->email }}</td>
                          <td class="px-4 py-2">{{ $masyarakat->created_at }}</td>
                          <td class="px-4 py-2 gap-3 sm:gap-5 justify-center flex relative">
                            <button onclick="openModal({{ $masyarakat->id }})" class="px-2 py-1 rounded text-white bg-red-500 flex items-center gap-2">
                              <i class="fa-solid fa-trash p-2 sm:p-0"></i> <p class="hidden sm:block">Hapus</p>
                            </button>
                          </td>
                      </tr>
              @endforeach
          </tbody>
      </table>
  </div>
  <div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-6 max-w-sm w-full">
        <h2 class="text-xl font-bold mb-4 dark:text-gray-100">Konfirmasi Hapus</h2>
        <p class="mb-4 dark:text-gray-100">Yakin ingin menghapus akun ini?</p>
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Ya, Hapus</button>
            </div>
        </form>
    </div>
  </div>
  <script>
    function openModal(id) {
        const form = document.getElementById('deleteForm');
        form.action = `/masyarakat-list/${id}`;
        document.getElementById('confirmModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('confirmModal').classList.add('hidden');
    }
  </script>
</x-app-layout>