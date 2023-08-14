<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use App\Models\todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TodosController extends Controller
{
    /*
    index para mostrar todos los "to do"
    store para guardar un "to do"
    update para actualizar un "to do"
    destroy para eliminar un "to do"
    edit para mostrar el formulario edicion
    */
    public function index()
    {
        $todos = todos::all();        
        $categorias = categorias::all();
        return view("tarea",["todos"=> $todos, "categorias" => $categorias, "activo"=> "todos"]);
    }

    
    public function create()
    {
       
    }

   
    public function store(Request $request)
    {
        $request->validate(
            ["tarea"=>"required|min:3",
            "categoria"=>"required"]);

        $todos = new todos;
        $todos->tarea = $request->tarea;
        $todos->categoria_id = $request->categoria;
        $todos->save();

        return redirect()->route("/todos")->with("success","Tarea creada correctamente");
    }

  
    public function show($todo_id, $categoria_id)
    {
        $todo = todos::find($todo_id);
        $categoria = categorias::find($categoria_id);
        $categorias = categorias::all();
        return view("show",["todo"=> $todo, "categorias"=>$categorias, "categoria_id"=>$categoria->id]);
    }

   
    public function edit(todos $todos)
    {
    }

   
    public function update(Request $request, todos $todos , $id)
    {
        $request->validate([
            "tarea"=>"required|min:3",
            "categoria"=>"required"
        ]);
        $todos->where("id",$id)
        ->update([
            "tarea"=>$request->tarea,
            "categoria_id"=>$request->categoria
        ]);
        // $todo->tarea = $request->tarea;
        // $todo->save();

        /*Para ver los metodos y atributos que tienen
        dd($todo); 
        dd($request);*/

        /*Este return no funciona porque la vista "tarea.blade.php" necesita un valor $todos que se le envia, como en index       
        return view("tarea",["success"=> "Tarea actualizada"]);*/
        
        return redirect()->route("/todos")->with("success","Tarea actualizada");
    }

   
    public function destroy($id)
    {
        $todo = todos::find($id);
        $todo->delete();

        return redirect()->route("/todos")->with("success","Tarea fue eliminada");
    }
}