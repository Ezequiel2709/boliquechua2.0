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
        Schema::create('secciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->integer('orden')->default(0);
            $table->timestamps();
        });

        Schema::create('circulos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seccion_id')->constrained('secciones')->onDelete('cascade');
            $table->string('nombre', 100);
            $table->string('icono', 20)->nullable();
            $table->integer('orden')->default(0);
            $table->timestamps();
        });

        Schema::create('sub_niveles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('circulo_id')->constrained('circulos')->onDelete('cascade');
            $table->integer('orden')->default(0);
            $table->timestamps();
        });

        Schema::create('user_progreso_niveles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('sub_nivel_id')->constrained('sub_niveles')->onDelete('cascade');
            $table->timestamp('completado_at')->useCurrent();
            $table->timestamps();
            
            $table->unique(['user_id', 'sub_nivel_id']); // Para evitar duplicados
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_progreso_niveles');
        Schema::dropIfExists('sub_niveles');
        Schema::dropIfExists('circulos');
        Schema::dropIfExists('secciones');
    }
};
