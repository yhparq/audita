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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('dni')->unique();
            $table->string('telefono');
            $table->string('correo')->unique();
            $table->string('institucion');
            $table->enum('tipo', ['pleno', 'observador', 'estudiante']);
            $table->string('codigo_operacion')->unique();
            $table->string('voucher_pago')->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('inactivo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
