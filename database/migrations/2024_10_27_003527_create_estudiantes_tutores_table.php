<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estudiantes_tutores', function (Blueprint $table) {
            $table->id();
            $table->foreignId("estudiantes_id")->references("id")->on("estudiantes")->onDelete("cascade");
            $table->foreignId("tutores_id")->references("id")->on("tutores")->onDelete("cascade");
            $table->foreignId("relaciones_id")->references("id")->on("relaciones")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes_tutores');
    }
};
