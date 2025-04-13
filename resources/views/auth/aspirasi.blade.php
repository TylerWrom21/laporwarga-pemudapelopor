<x-app-layout class="flex justify-center items-center">
  <div class="flex justify-center items-center flex-column w-full sm:min-w-[35rem]">
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold text-center leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">Buat Aspirasi</h1>
        <form class="space-y-4 md:space-y-6" action="{{ route('aspirasi.store')}}" method="POST">
          @csrf
          <div>
            <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
            <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
          </div>
          <div>
            <label for="isi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi</label>
            <textarea id="isi" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
          </div>
          <div class="w-full flex justify-center">
            <x-button type="submit">Kirim</x-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>