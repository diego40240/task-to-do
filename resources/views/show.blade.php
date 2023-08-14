@extends("app")
@section("content")
  

  {{-- Formulario CREAR tarea --}}
<div class="w-[33%] flex flex-col justify-center m-auto pt-10">
  <form action={{ route("todos-update",["id"=>$todo->id]) }} method="POST">
      @method("PATCH")
      @csrf
      {{-- Mensaje creacion correcta --}}
      @if (session("success"))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
          <span class="font-medium">{{session("success")}}</span>
        </div>
      @endif
    
      {{-- Mensaje ERROR en input --}}
      @error('tarea')
      <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium"> <h6>{{ $message }}</h6></span>
      </div>
         
      @enderror
  
      {{-- Inputs CREAR tarea --}}
      <div class="mb-6">
        <label for="tarea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarea</label>
        <input type="text" id="tarea" name="tarea" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escribe tu tarea" value="{{$todo->tarea}}">

        <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categorias</label>
        <select name="categoria" id="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">          
          @foreach ($categorias as $categoria )
          <option value="{{ $categoria->id }}" {{ ($categoria->id === $categoria_id) ? "selected" :"" }}>{{ $categoria->categoria }}</option>
          @endforeach
        </select>  
      </div>
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar tarea</button>
  </form> 
   
    
</div>
@endsection