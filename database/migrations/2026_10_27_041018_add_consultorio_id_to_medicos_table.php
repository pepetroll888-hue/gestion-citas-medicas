<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('medicos', function (Blueprint $table) {
            $table->unsignedBigInteger('consultorio_id')->nullable(); // O foreignId si prefieres
        });
    }

    public function down(): void
    {
        Schema::table('medicos', function (Blueprint $table) {
            $table->dropColumn('consultorio_id');
        });
    }
};