<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Saludos', 'icono' => '👋', 'orden' => 1],
            ['nombre' => 'Animales', 'icono' => '🦙', 'orden' => 2],
            ['nombre' => 'Partes del Cuerpo', 'icono' => '🦵', 'orden' => 3],
            ['nombre' => 'Colores', 'icono' => '🎨', 'orden' => 4],
            ['nombre' => 'Emociones', 'icono' => '😊', 'orden' => 5],
            ['nombre' => 'Expresiones', 'icono' => '💬', 'orden' => 6],
        ]);
    }
}
