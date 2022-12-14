<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Tabla 1 - UNICOR CRUD</title>
</head>
<!-- component -->

<body class="font-poppins antialiased">
  <div id="view" class="h-full w-screen flex flex-row bg-teal-700" x-data="{ sidenav: true }">
    <button @click="sidenav = true" class="p-2 border-2 bg-white rounded-md border-gray-200 shadow-lg text-gray-500 focus:bg-teal-500 focus:outline-none focus:text-white absolute top-0 left-0 sm:hidden">
      <svg class="w-5 h-5 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
      </svg>
    </button>
    <div id="sidebar" class="bg-white h-screen md:block shadow-xl px-3 w-30 md:w-60 lg:w-60 overflow-x-hidden transition-transform duration-300 ease-in-out" x-show="sidenav" @click.away="sidenav = false">
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
    <!-- TABLA1 -->
      <table class="border-collapse">
        <thead>
            <tr>
              <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">ID</th>
              <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Nombres</th>
              <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Apellidos</th>
              <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Descripci??n</th>
              <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Acciones</th>
            </tr>
        </thead>
        <tbody>
          <?php
            foreach($array as $item):
          ?>
            <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Company name</span>
                    <?php echo $item['id'] ?>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Company name</span>
                    <?php echo $item['nombres'] ?>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                    <?php echo $item['apellidos'] ?>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                    <?php echo $item['descripcion'] ?>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                    <a 
                      href="index.php?m=LINK_VER_UPDATE_TABLE1&id=<?php echo $item['id'] ?>&nombres=<?php echo $item['nombres'] ?>&apellidos=<?php echo $item['apellidos'] ?>&descripcion=<?php echo $item['descripcion'] ?>" 
                      class="text-blue-400 hover:text-blue-600 underline"
                    >
                      Update
                    </a>
                    
                    <a href="index.php?m=LINK_VER_DELETE_TABLE1&id=<?php echo $item['id'] ?>&nombres=<?php echo $item['nombres'] ?>&apellidos=<?php echo $item['apellidos'] ?>&descripcion=<?php echo $item['descripcion'] ?>"
                      class="text-blue-400 hover:text-blue-600 underline pl-6">Delete</a>
                </td>
            </tr>
          <?php
            endforeach;
          ?>
        </tbody>
      </table>
    <!-- TABLA1 -->

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