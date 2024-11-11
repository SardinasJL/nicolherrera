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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->integer("ci");
            $table->string("nombre", 50);
            $table->string("apellido", 50);
            $table->date("nacimiento");
            $table->string("direccion", 200);
            $table->foreignId("cursos_id")->references("id")->on("cursos");
            $table->string("foto", 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
