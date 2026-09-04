<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DuolingoSeeder extends Seeder
{
    public function run(): void
    {
        // Crear una Sección por defecto
        $seccionId = DB::table('secciones')->insertGetId([
            'nombre' => 'Unidad 1: Fundamentos',
            'orden' => 1
        ]);

        $categorias = DB::table('categorias')->get();

        foreach ($categorias as $cat) {
            // Para cada categoría, crear 20 círculos (nodos)
            for ($i = 1; $i <= 20; $i++) {
                $circuloId = DB::table('circulos')->insertGetId([
                    'seccion_id' => $seccionId,
                    'categoria_id' => $cat->id,
                    'nombre' => 'Nivel ' . $i,
                    'icono' => null,
                    'orden' => $i
                ]);

                // Para cada círculo, crear 3 sub-niveles (estrellas)
                for ($j = 1; $j <= 3; $j++) {
                    DB::table('sub_niveles')->insert([
                        'circulo_id' => $circuloId,
                        'orden' => $j
                    ]);
                }
            }
        }
    }
}
