<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('tarea');
// })->name("/");

// Route::get('tarea', function () {
//     return view('tarea');
// })->name("/todos");
Route::get("/",[TodosController::class,"index"])->name("/");

// RUTAS de METODOS para crear tarea
Route::get("/tarea",[TodosController::class,"index"])->name("/todos");
Route::post("/tarea", [TodosController::class,"store"])->name("/todos");
Route::get("/tarea/{todo_id}/{categoria_id}", [TodosController::class,"show"])->name("todos-show");
Route::patch("/tarea/{id}", [TodosController::class,"update"])->name("todos-update");
Route::delete("/tarea/{id}", [TodosController::class,"destroy"])->name("todos-destroy");


// RUTAS CATEGORIA
Route::get("/categoria",[CategoriasController::class,"index"])->name("categoria");
Route::post("/categoria",[CategoriasController::class,"store"])->name("categoria-store");
Route::get("/categoria/{id}",[CategoriasController::class,"show"])->name("categoria-show");
Route::patch("/categoria/{id}",[CategoriasController::class,"update"])->name("categoria-update");
Route::delete("/categoria/{id}",[CategoriasController::class,"destroy"])->name("categoria-destroy");