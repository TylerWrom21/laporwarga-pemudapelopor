<x-app-layout class="flex justify-center items-center">
  {{-- <div class="flex justify-center items-center flex-column w-full sm:min-w-[35rem]">
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold text-center leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">Buat Aspirasi</h1>
        <form class="space-y-4 md:space-y-6" action="{{ route('aspirasi.store')}}" method="PUT">
          @csrf
          @method('PUT')
          <div>
            <label for="judul" id="disabled-input" aria-label="disabled input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
            <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
          </div>
          <div>
            <label for="isi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi</label>
            <textarea id="isi" name="isi" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
          </div>
          <div class="w-full flex justify-center">
            <x-button type="submit">Kirim</x-button>
          </div>
        </form>
      </div>
    </div>
  </div> --}}
  <div class="max-w-3xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-6">Detail Aspirasi</h2>

    @if (session('success'))
        <div class="mb-4 text-green-500">{{ session('success') }}</div>
    @endif

    <div class="bg-white shadow p-6 rounded-lg border mb-8">
        <p><strong>Pengirim:</strong> {{ $aspirasi->user->nama ?? 'Anonim' }}</p>
        <p><strong>Judul:</strong> {{ $aspirasi->judul }}</p>
        <p class="mt-2"><strong>Isi:</strong></p>
        <p class="text-gray-700 whitespace-pre-wrap">{{ $aspirasi->isi }}</p>
        <p class="mt-4"><strong>Status:</strong> 
            <span class="px-2 py-1 rounded text-white 
            @if($aspirasi->status == 'diajukan') bg-yellow-500
            @elseif($aspirasi->status == 'diproses') bg-blue-500
            @else bg-green-500 @endif">
            {{ ucfirst($aspirasi->status) }}
            </span>
        </p>
    </div>

    {{-- Form Tanggapan --}}
    <div class="bg-gray-100 p-6 rounded-lg shadow">
        <h3 class="text-xl font-semibold mb-4">Beri Tanggapan</h3>
        <form method="POST" action="{{ route('petugas.aspirasi.tanggapan', $aspirasi->id) }}">
            @csrf
            <textarea name="tanggapan" rows="4" class="w-full border rounded p-2" placeholder="Tulis tanggapan di sini..." required></textarea>
            <button type="submit" class="mt-4 bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                Kirim Tanggapan
            </button>
        </form>
    </div>
</div>
</x-app-layout>