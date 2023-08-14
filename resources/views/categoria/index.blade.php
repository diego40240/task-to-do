@extends("app")
@section("content")
  

  {{-- Formulario CREAR tarea --}}
<div class="w-[80%] lg:w-[50%] xl:w-[33%] flex flex-col justify-center m-auto pt-10">
  <form action={{ route("categoria-store") }} method="POST" autocomplete="off">
      @csrf
      {{-- Mensaje creacion correcta --}}
      @if (session("success"))
        <div id="msj" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
          <span class="font-medium">{{session("success")}}</span>
        </div>
      @endif
    
      {{-- Mensaje ERROR en input --}}
      @error('categoria')
      <div id="msj" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium"> <h6>{{ $message }}</h6></span>
      </div>
      @enderror
  
      {{-- Inputs CREAR tarea --}}
      <div class="mb-6">
        <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nueva categoria</label>
        <input type="text" id="categoria" name="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escribe tu categoria">
        <label for="categoria_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccionar color</label>
        <input type="color" id="categoria_color" name="categoria_color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      </div>    
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear categoria</button>
    </form>
    
    {{-- Listado de tareas --}}   
    <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white flex items-center flex-col">
    
    @foreach ($categorias as $categoria)
    <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600 flex items-center justify-between">
        
      <a href="{{ route('categoria-show', ['id'=>$categoria->id]) }}" class="flex gap-3 w-full">
        <div class="w-5 h-5" style="background-color:{{$categoria->color}}"></div>
        {{$categoria->categoria}}
    </a>

      {{-- Formulario DELETE tarea --}}
      <form id="form_delete_categoria-{{ $categoria->id }}" action="{{ route('categoria-destroy', ['id'=>$categoria->id]) }}" method="POST">
        @method("DELETE")
        @csrf
        <button type="button" id="delete_categoria" data-modal-target="modal_delete_categoria-{{ $categoria->id }}" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
      </form>

      
{{-- Modal Eliminar Categoria --}}
<div id="modal_delete_categoria-{{ $categoria->id }}" tabindex="-1" class="fixed justify-center items-center bg-black bg-opacity-70 z-50 p-4 hidden overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <button type="button" id="cerrar_modal_delete" data-modal-hide="modal_delete_categoria-{{ $categoria->id }}" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
              <span class="sr-only">Cerrar modal</span>
          </button>
          <div class="p-6 w-full h-full text-center">
              <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
              </svg>
              <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro? Si borras la <b>categoría</b>, se eliminarán todas las <b>tareas</b> asociadas</h3>
              <button data-modal-hide="popup-modal" type="submit" form="form_delete_categoria-{{ $categoria->id }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                  Si, estoy seguro.
              </button>
              <button id="cerrar_modal_delete" data-modal-hide="modal_delete_categoria-{{ $categoria->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
          </div>
      </div>
  </div>
</div>
{{-- FIN Modal Eliminar Categoria --}}


    </li>     
    @endforeach    
    </ul>    
    
</div>



<script>
  document.addEventListener('DOMContentLoaded', () => {
  let msjAlert = document.getElementById('msj');

        if (msjAlert) {
            setTimeout(function () {
              msjAlert.style.display = 'none';
            }, 2500);
        }
    }); 


    //Funcionalidad mostrar/ocultar MODAL ELMINAR 

    let buttonsDelete = document.querySelectorAll("#delete_categoria");    
    

    buttonsDelete.forEach(buttonDelete => {

      buttonDelete.addEventListener("click", ()=>{
      let idModal= buttonDelete.dataset.modalTarget;
      let verModalDetele = document.getElementById(idModal);
      verModalDetele.style.display = "flex";
    })

    });

    let cerrarModal = document.querySelectorAll("#cerrar_modal_delete");
    cerrarModal.forEach(cerrar => {

      cerrar.addEventListener("click", ()=>{
      let idModal= cerrar.dataset.modalHide;
      let modalDetele = document.getElementById(idModal);
      modalDetele.style.display = "none";
    })

    });

</script>

{{-- <script>
  let itemsMenu = document.getElementsByName("items-menu");
  if (itemsMenu) {
    itemsMenu.forEach(item => {
      item.style.color="black";
      if (item.id === "menu-1") {
        item.style.color="blue";
      }      
  });
  }
  

</script> --}}
@endsection