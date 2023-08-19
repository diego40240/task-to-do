<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use App\Models\todos;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = categorias::all();        
       return view("categoria.index",["categorias"=>$categorias, "activo"=>"categorias"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $request->validate(
            ["categoria"=>"required|min:3"]);
            
        $categorias = new categorias;
        $categorias->categoria = $request->categoria;
        $categorias->color = $request->categoria_color;
        $categorias->save();

        return redirect()->route("categoria")->with("success","Categoria creada correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = categorias::find($id);

        return view("categoria.show",["categoria"=>$categoria, "activo"=>"categorias"]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categorias $categorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categorias $categorias, $id)
    {
        $request->validate(
            ["categoria"=>"required|min:3"]);
            $categorias->where("id",$id)
            ->update([
                'categoria' => $request->categoria, 
                'color' => $request->categoria_color
            ]);

            // $categorias->where("id",$id)->update(['color' => $request->categoria_color]);
        // $categoria = $categorias->find($id);
        // $categoria->categoria = $request->categoria;
        // $categoria->color = $request->categoria_color;
        // $categoria->update();

        return redirect()->route("categoria")->with("success","Categoria actualizada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categorias $categorias, $id)
    {
        $categoria = $categorias->find($id);
        $categoria->delete();

        return redirect()->route("categoria")->with("success", "Categoria eliminada correctamente");
    }
}