<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('todos', function (Blueprint $table) {

            $table->foreignId('categoria_id')->after("tarea")->constrained()->cascadeOnUpdate()->cascadeOnDelete();
                      
            // $table->unsignedBigInteger('categoria_id');
 
            // $table->foreign('categoria_id')->references('id')->on('categorias');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->dropForeign(['categoria_id']);
        });
    }
};