<x-app-layout class="mt-20">
  <div class="max-w-6xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-6">Dashboard Petugas</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-blue-500 text-white rounded-lg p-6 shadow">
            <h3 class="text-lg font-semibold">Total Aspirasi</h3>
            <p class="text-3xl mt-2">{{ $total }}</p>
        </div>
        <div class="bg-red-500 text-white rounded-lg p-6 shadow">
            <h3 class="text-lg font-semibold">Diajukan</h3>
            <p class="text-3xl mt-2">{{ $dikirim }}</p>
        </div>
        <div class="bg-yellow-500 text-white rounded-lg p-6 shadow">
            <h3 class="text-lg font-semibold">Diproses</h3>
            <p class="text-3xl mt-2">{{ $diproses }}</p>
        </div>
        <div class="bg-green-500 text-white rounded-lg p-6 shadow">
            <h3 class="text-lg font-semibold">Selesai</h3>
            <p class="text-3xl mt-2">{{ $selesai }}</p>
        </div>
    </div>

    <div class="mt-8">
        {{-- <a href="{{ route('aspirasi.verifikasi') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
            Kelola Aspirasi Masuk
        </a> --}}
    </div>
  </div>
</x-app-layout>