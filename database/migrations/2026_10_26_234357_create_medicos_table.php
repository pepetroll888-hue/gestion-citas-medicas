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
        Schema::create('medicos', function (Blueprint $table) {

            $table->id();

            $table->string('nombre', 100);

            $table->string('apellido_paterno', 100);

            $table->string('apellido_materno', 100);

            $table->string('telefono', 20);

            $table->string('correo')->unique();

            $table->foreignId('especialidad_id')
                  ->constrained('especialidades')
                  ->onDelete('no action');

            $table->boolean('activo')->default(true);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};