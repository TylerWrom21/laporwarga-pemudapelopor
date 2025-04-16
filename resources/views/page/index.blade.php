<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel = "icon" type = "image/png" href = "/asset/image/laporwarga.png">
    <link rel = "apple-touch-icon" type = "image/png" href = "/asset/image/laporwarga.png"/>
    <title>LaporWarga</title>
    <style>
      .slide {
        opacity: 0;
        transition: opacity 1s ease-in-out;
      }
      .active {
        opacity: 1;
      }
    </style>
  </head>
  <body>
  <x-navbar></x-navbar>
  {{-- <div class="bg-white dark:bg-slate-800 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl">
    <div>
      <span class="inline-flex items-center justify-center p-2 bg-indigo-500 rounded-md shadow-lg">
        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><!-- ... --></svg>
      </span>
    </div>
    <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Writes Upside-Down</h3>
    <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">
      The Zero Gravity Pen can be used to write in any orientation, including upside-down. It even works in outer space.
    </p>
  </div> --}}
  <section class="w-full h-screen flex items-center justify-center relative overflow-hidden">
    <div class="slide-container w-full h-screen flex">
      <div class="slide w-full h-screen absolute top-0 left-0 flex flex-col justify-center items-center active">
        <h1 class="text-4xl md:text-6xl font-bold text-black mb-4">Sampaikan Aspirasi Anda dengan Mudah!</h1>
        <p class="text-lg text-gray-800 mb-6">Aplikasi ini membantu warga menyampaikan aspirasi dengan cepat dan transparan.</p>
      </div>
      <div class="slide w-full h-screen absolute top-0 left-0 flex flex-col justify-center items-center">
        <h1 class="text-4xl md:text-6xl font-bold text-black mb-4">Dukung Perubahan di Masyarakat!</h1>
        <p class="text-lg text-gray-800 mb-6">Aspirasi Anda dapat membantu membangun lingkungan yang lebih baik.</p>
      </div>
      <div class="slide w-full h-screen absolute top-0 left-0 flex flex-col justify-center items-center">
        <h1 class="text-4xl md:text-6xl font-bold text-black mb-4">Cepat, Mudah, dan Transparan!</h1>
        <p class="text-lg text-gray-800 mb-6">Laporkan keluhan dengan sistem yang jelas dan dapat dipantau.</p>
      </div>
    </div>
    <button id="prevSlide" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black text-white px-4 py-2 rounded-full shadow-md hover:bg-gray-700">❮</button>
    <button id="nextSlide" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black text-white px-4 py-2 rounded-full shadow-md hover:bg-gray-700">❯</button>
  </section>
  </body>
  <script src="../asset/js/script.js"></script>
  <script>
    function homeSlider() {
    let slides = document.querySelectorAll(".slide");
    let index = 0;
    let nextSlider = document.querySelector('#nextSlide');
    let prevSlider = document.querySelector('#prevSlide');
    
    function showSlide(i) {
        slides.forEach((slide) => slide.classList.remove("active"));
        slides[i].classList.add("active");
    }
    
    function nextSlide() {
        index = (index + 1) % slides.length;
        showSlide(index);
    }
    
    function prevSlide() {
        index = (index - 1 + slides.length) % slides.length;
        showSlide(index);
    }
    
    nextSlider.addEventListener("click", nextSlide);
    prevSlider.addEventListener("click", prevSlide);
    
    setInterval(nextSlide, 5000);
    }
    homeSlider();
  </script>
</html>