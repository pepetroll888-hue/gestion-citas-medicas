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
        Schema::create('citas', function (Blueprint $table) {

            $table->id();

            $table->foreignId('paciente_id')
                ->constrained('pacientes')
                ->onDelete('restrict');

            $table->foreignId('medico_id')
                ->constrained('medicos')
                ->onDelete('restrict');

            $table->foreignId('consultorio_id')
                ->constrained('consultorios')
                ->onDelete('restrict');

            $table->date('fecha');

            $table->time('hora');

            $table->string('motivo', 255);

            $table->enum('estado', [
                'PROGRAMADA',
                'ATENDIDA',
                'CANCELADA'
            ])->default('PROGRAMADA');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};