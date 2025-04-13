<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel = "icon" type = "image/png" href = "/asset/image/laporwarga.png">
    <link rel = "apple-touch-icon" type = "image/png" href = "/asset/image/laporwarga.png"/>
    <title>Login</title>
  </head>
  <body>
  <div class="flex justify-center items-center h-[100vh] bg-blue-500">
    <div class="rounded-lg overflow-hidden border flex shadow-xl p-5 gap-5 bg-slate-100">
      <div class="p-5 bg-blue-500 rounded-sm min-w-[35rem] flex flex-col justify-center">
        <img src="asset/image/laporwarga.png" alt="LaporWarga" srcset="">
      </div>
      <div class="p-5 min-w-[35rem] flex flex-col justify-center">
        <form method="POST" action="{{ route('registrasi.login') }}" class="w-full flex flex-col">
          @csrf
          <h1 class="text-3xl text-slate-800 font-bold mb-10 text-center">Login</h1>
          @if (session('success'))
          <div class="mb-5 text-green-500 text-center text-xl font-semibold">
            {{ session('success') }}
          </div>
          @endif
          <div class="mb-5">
            <label for="email" class="block mb-2 text-lg font-semibold text-gray-900">Email</label>
            <input type="email" id="email" name="email" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required />
          </div>
          <div class="mb-5">
            <label for="password" class="block mb-2 text-lg font-semibold text-gray-900">Password</label>
            <input type="password" id="password" minlength="8" name="password" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required />
          </div>
          <p class="mb-5 text-center">Belum punya akun? <a href="/registrasi" class="transition hover:text-blue-500">Registrasi</a></p>
          <x-button type="submit">Kirim</x-button>
          @if ($errors->any())
            <div class="mb-5 text-red-500 text-center text-xl font-semibold">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
        </form>
      </div>
    </div>
  </div>
  </body>
  <script src="../asset/js/script.js"></script>
</html>