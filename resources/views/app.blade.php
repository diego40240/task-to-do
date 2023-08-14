<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
 
{{-- -------------------- --}}

<nav class="bg-white border-gray-200 dark:bg-gray-900 border-b dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{route("/")}}" class="flex items-center">
      <svg class="w-6 h-8 mr-3 text-blue-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
        <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
        <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
      </svg>
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Task to do</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="{{route("/todos")}}" class="block py-2 pl-3 pr-4 rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500 {{ ($activo==="todos") ? "md:text-blue-700 bg-blue-700 text-white": "text-gray-900 bg-transparent"  }}" aria-current="page">Tareas</a>
        </li>
        <li>
          <a href="{{ route('categoria') }}" class="block py-2 pl-3 pr-4  rounded md:bg-transparent hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent {{ ($activo==="categorias") ? "md:text-blue-700 bg-blue-700 text-white": ": text-gray-900"  }}">Categorias</a>
        </li>        
      </ul>
    </div>
  </div>
</nav>
{{-- ----------------- --}}

    @yield("content")
 
</body>

<script>
  let btnMenuRespo = document.querySelector("[data-collapse-toggle]");
  let idRespo = btnMenuRespo.dataset.collapseToggle;
  let menuRespo = document.getElementById(idRespo);
  btnMenuRespo.addEventListener("click", ()=>{
    if (menuRespo.style.display === "block") {
      menuRespo.style.display="none";
    } else {
      menuRespo.style.display="block";
    }
   
  })
</script>  

{{-- <script>
  let itemsMenu = document.getElementsById("menu_responsive");
  if (itemsMenu) {
    itemsMenu.addEventListener("click", ()=>{
      itemsMenu.style.display="flex";
    })
    
  }

</script> --}}


</html>