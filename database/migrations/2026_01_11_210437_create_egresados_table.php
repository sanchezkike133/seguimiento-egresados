<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('egresados', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 8)->unique();
            $table->string('nombre_completo');
            $table->string('carrera');
            $table->string('generacion');
            $table->enum('estatus', ['Egresado', 'En seguimiento', 'Titulado']);
            $table->string('domicilio');
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro']);
            $table->string('telefono', 15);
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('egresados');
    }
};
