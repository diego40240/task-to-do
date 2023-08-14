@extends("app")
@section("content")
  

  {{-- Formulario CREAR tarea --}}
<div class="w-[80%] lg:w-[50%] xl:w-[33%] flex flex-col justify-center m-auto pt-10">
  <form action="{{ route('categoria-update', ['id'=>$categoria->id]) }}" method="POST" autocomplete="off">
    @method("PATCH")
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
        <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Editar categoria</label>
        <input type="text" id="categoria" name="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escribe tu categoria" value="{{ $categoria->categoria }}">
        <label for="categoria_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccionar color</label>
        <input type="color" id="categoria_color" name="categoria_color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $categoria->color }}">
      </div>    
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar categoria</button>
    </form> 
 
   
    
</div>

@endsection