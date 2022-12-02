<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Create - UNICOR CRUD</title>
</head>
<!-- component -->

<body class="font-poppins antialiased">
  <div id="view" class="h-full w-screen flex flex-row bg-teal-700" x-data="{ sidenav: true }">
    <button @click="sidenav = true" class="p-2 border-2 bg-white rounded-md border-gray-200 shadow-lg text-gray-500 focus:bg-teal-500 focus:outline-none focus:text-white absolute top-0 left-0 sm:hidden">
      <svg class="w-5 h-5 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
      </svg>
    </button>
    <div id="sidebar" class="bg-white h-screen md:block shadow-xl px-3 w-30 md:w-60 lg:w-60 overflow-x-hidden transition-transform duration-300 ease-in-out" x-show="sidenav" @click.away="sidenav = true">
      <div class="space-y-6 md:space-y-10 mt-10">
        <h1 class="font-bold text-4xl text-center md:hidden">
          D<span class="text-teal-600">.</span>
        </h1>
        <h1 class="hidden md:block font-bold text-sm md:text-xl text-center">
          Unicor CRUD<span class="text-teal-600">.</span>
        </h1>
        <div id="profile" class="space-y-3">
          <img width="100" height="200" class="ml-14 mb-4" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Universiordoba_Colombia.svg/800px-Universiordoba_Colombia.svg.png" alt="">
          <div>
            <h2 class="font-medium text-xs md:text-sm text-center text-teal-700">
              Luis Mercado
            </h2>
            <p class="text-xs text-gray-500 text-center">Administrator</p>
          </div>
        </div>
        <hr class="bg-green-700">
        <div id="menu" class="flex flex-col space-y-2">
          <a href="index.php?m=LINK_VER_TABLA1" class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-700 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
            <span class="">Ver Tabla 1</span>
          </a>
          <a href="index.php?m=LINK_VER_TABLA2" class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-700 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
            <span class="">Ver Tabla 2</span>
          </a>
          <a href="index.php?m=LINK_CREATE" class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-700 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out">
            <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
            </svg>
            <span class="">Create</span>
          </a>
          
        </div>
      </div>
    </div>
    
    <!-- CREATE FORM -->
    <div class="flex items-center justify-center p-12 mx-32">
      <!-- Author: FormBold Team -->
      <!-- Learn More: https://formbold.com -->
      <div class="mx-auto w-full max-w-[550px]">
        <form action="index.php?m=TABLA1CREATE" method="POST">
          <div class="mb-5">
            <input
              type="text"
              name="nombres"
              id="nombres"
              placeholder="Nombres"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-1 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
          <div class="mb-5">
            <input
              type="text"
              name="apellidos"
              id="apellidos"
              placeholder="Apellidos"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-1 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
          <div class="mb-5">
            <textarea
              rows="4"
              name="descripcion"
              id="descripcion"
              placeholder="Descripcion"
              class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-1 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            ></textarea>
          </div>
          <div>
            <button
              class="hover:shadow-form rounded-md bg-green-500 py-3 px-8 text-base font-semibold text-white outline-none"
            >
              Agregar a TABLA 1
            </button>
          </div>
        </form>
      </div>
    </div>
    <!-- CREATE FORM -->

    <!-- CREATE FORM TABLA 2-->
    <div class="flex items-center justify-center p-2">
      <!-- Author: FormBold Team -->
      <!-- Learn More: https://formbold.com -->
      <div class="mx-auto w-full max-w-[550px]">
        <form action="index.php?m=TABLA2CREATE" method="POST">
          <div class="mb-5">
            <input
              type="text"
              name="tabla1_id"
              id="tabla1_id"
              placeholder="tabla1 id"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-1 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
          <div class="mb-5">
            <input
              type="text"
              name="titulo"
              id="titulo"
              placeholder="Titulo"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-1 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
          <div class="mb-5">
          <label for="horario" class="text-gray-100">Horario</label>
            <input
              type="datetime-local"
              name="horario"
              id="horario"
              placeholder="Horario"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-1 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          
          </div>
          <div class="mb-5">
            <label for="fecha" class="text-gray-100">Fecha</label>
            <input
              type="date"
              name="fecha"
              id="fecha"
              placeholder="Fecha"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-1 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
          <div class="mb-5">
            <input
              type="text"
              name="unidades"
              id="unidades"
              placeholder="Unidades"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-1 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
          <div class="mb-5">
            <input
              type="text"
              name="precio"
              id="precio"
              placeholder="Precio"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-1 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
          <div class="mb-5">
            <input
              type="email"
              name="email"
              id="email"
              placeholder="Email"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-1 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
          <div class="mb-5">
            <textarea
              rows="4"
              name="descripcion"
              id="descripcion"
              placeholder="Descripcion"
              class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-1 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            ></textarea>
          </div>
          <div>
            <button
              class="hover:shadow-form rounded-md bg-green-500 py-3 px-8 text-base font-semibold text-white outline-none"
            >
              Agregar a TABLA 2
            </button>
          </div>
        </form>
      </div>
    </div>
    <!-- CREATE FORM -->

  </div>

  <script src="js/graph.js" type="text/javascript"></script>
  <script>
    var user = document.getElementById("user-chart").nodeName;
    var chart = new Graph({
      data: [1, 20, 5, 6, 8],
      target: document.querySelector(user),
    });
  </script>
</body>

</html>