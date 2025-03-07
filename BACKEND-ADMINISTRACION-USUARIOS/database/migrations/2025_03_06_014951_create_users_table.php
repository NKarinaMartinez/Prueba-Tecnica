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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usuario', 100);
            $table->string('email', 100);
            $table->string('primerNombre', 100);
            $table->string('segundoNombre', 100);
            $table->string('primerApellido', 100);
            $table->string('segundoApellido', 100);

            //Claves foraneas
            $table->foreignId('idDepartamento')->constrained('departamentos');
            $table->foreignId('idCargo')->constrained('cargos');

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
