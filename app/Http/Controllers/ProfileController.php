<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Categoria;
use App\Models\Palabra;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form with Duolingo-style stats and gamification.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        $puntuacion = $user->puntuacion_total ?? 0;
        $racha = $user->racha_dias ?? 0;
        $vidas = $user->vidas ?? 5;

        // Niveles y XP (Experiencia)
        $niveles = [
            1 => ['nombre' => 'Chasqui Principiante', 'min_xp' => 0, 'max_xp' => 100, 'icon' => '🏃'],
            2 => ['nombre' => 'Caminante Andino', 'min_xp' => 100, 'max_xp' => 250, 'icon' => '🦙'],
            3 => ['nombre' => 'Guerrero Quechua', 'min_xp' => 250, 'max_xp' => 500, 'icon' => '🏹'],
            4 => ['nombre' => 'Sabio Amauta', 'min_xp' => 500, 'max_xp' => 1000, 'icon' => '📜'],
            5 => ['nombre' => 'Inca Supremo', 'min_xp' => 1000, 'max_xp' => 2500, 'icon' => '👑'],
        ];

        $nivelActual = 1;
        $nivelInfo = $niveles[1];
        foreach ($niveles as $lvl => $info) {
            if ($puntuacion >= $info['min_xp']) {
                $nivelActual = $lvl;
                $nivelInfo = $info;
            }
        }

        $siguienteXp = $nivelInfo['max_xp'];
        $baseXp = $nivelInfo['min_xp'];
        $xpEnNivel = max(0, $puntuacion - $baseXp);
        $xpRequerida = max(1, $siguienteXp - $baseXp);
        $progresoNivel = min(100, round(($xpEnNivel / $xpRequerida) * 100));

        // Liga / División
        if ($puntuacion >= 700) {
            $liga = ['nombre' => 'Liga Inti (Diamante)', 'color' => '#00E6C3', 'icono' => '💎'];
        } elseif ($puntuacion >= 350) {
            $liga = ['nombre' => 'Liga Oro', 'color' => '#FFD166', 'icono' => '🥇'];
        } elseif ($puntuacion >= 150) {
            $liga = ['nombre' => 'Liga Plata', 'color' => '#E0E0E0', 'icono' => '🥈'];
        } else {
            $liga = ['nombre' => 'Liga Bronce', 'color' => '#CD7F32', 'icono' => '🥉'];
        }

        // Calendario semanal de racha (Lunes a Domingo)
        $diasSemana = [
            ['letra' => 'L', 'nombre' => 'Lunes'],
            ['letra' => 'M', 'nombre' => 'Martes'],
            ['letra' => 'M', 'nombre' => 'Miércoles'],
            ['letra' => 'J', 'nombre' => 'Jueves'],
            ['letra' => 'V', 'nombre' => 'Viernes'],
            ['letra' => 'S', 'nombre' => 'Sábado'],
            ['letra' => 'D', 'nombre' => 'Domingo'],
        ];
        
        // Determinar días activos en la semana actual según la racha
        $diaHoy = now()->dayOfWeekIso; // 1 = Lunes, 7 = Domingo
        $calendarioRacha = [];
        foreach ($diasSemana as $idx => $dia) {
            $diaNum = $idx + 1;
            $esHoy = ($diaNum === $diaHoy);
            // Si el día está dentro del rango de días recientes cubiertos por la racha
            $activo = ($diaNum <= $diaHoy && ($diaHoy - $diaNum) < max(1, $racha));
            if ($racha <= 0) {
                $activo = false;
            }
            $calendarioRacha[] = [
                'letra' => $dia['letra'],
                'nombre' => $dia['nombre'],
                'es_hoy' => $esHoy,
                'activo' => $activo,
            ];
        }

        // Estadísticas de contenido
        $totalCategorias = Categoria::count();
        $totalPalabras = Palabra::count();

        // Sistema de Logros Duolingo
        $logros = [
            [
                'id' => 'primera_leccion',
                'titulo' => 'Primeros Pasos',
                'descripcion' => 'Consigue tus primeros puntos en el aprendizaje de quechua.',
                'icono' => '🌱',
                'completado' => $puntuacion > 0,
                'progreso' => min(1, $puntuacion > 0 ? 1 : 0),
                'maximo' => 1,
                'actual' => $puntuacion > 0 ? 1 : 0,
                'color' => '#00E6C3',
            ],
            [
                'id' => 'fuego_andino_3',
                'titulo' => 'Fuego Andino',
                'descripcion' => 'Mantén una racha activa de 3 días seguidos.',
                'icono' => '🔥',
                'completado' => $racha >= 3,
                'progreso' => min(3, $racha),
                'maximo' => 3,
                'actual' => min(3, $racha),
                'color' => '#FF4A10',
            ],
            [
                'id' => 'fuego_andino_7',
                'titulo' => 'Llama Inmortal',
                'descripcion' => 'Alcanza una racha legendaria de 7 días consecutivos.',
                'icono' => '⚡',
                'completado' => $racha >= 7,
                'progreso' => min(7, $racha),
                'maximo' => 7,
                'actual' => min(7, $racha),
                'color' => '#FFD166',
            ],
            [
                'id' => 'maestro_vocabulario',
                'titulo' => 'Maestro del Saber',
                'descripcion' => 'Acumula 100 puntos de experiencia en el juego.',
                'icono' => '🏆',
                'completado' => $puntuacion >= 100,
                'progreso' => min(100, $puntuacion),
                'maximo' => 100,
                'actual' => min(100, $puntuacion),
                'color' => '#A66BFF',
            ],
            [
                'id' => 'sabio_inti',
                'titulo' => 'Sabio de Inti',
                'descripcion' => 'Alcanza los 500 puntos y conviértete en un Amauta.',
                'icono' => '☀️',
                'completado' => $puntuacion >= 500,
                'progreso' => min(500, $puntuacion),
                'maximo' => 500,
                'actual' => min(500, $puntuacion),
                'color' => '#FF7A3E',
            ],
            [
                'id' => 'corazon_guerrero',
                'titulo' => 'Corazón Guerrero',
                'descripcion' => 'Mantén tus 5 vidas intactas en tu sesión.',
                'icono' => '💖',
                'completado' => $vidas >= 5,
                'progreso' => $vidas >= 5 ? 1 : 0,
                'maximo' => 1,
                'actual' => $vidas >= 5 ? 1 : 0,
                'color' => '#FF4D4D',
            ],
        ];

        return view('profile.edit', compact(
            'user',
            'puntuacion',
            'racha',
            'vidas',
            'nivelActual',
            'nivelInfo',
            'siguienteXp',
            'xpEnNivel',
            'xpRequerida',
            'progresoNivel',
            'liga',
            'calendarioRacha',
            'totalCategorias',
            'totalPalabras',
            'logros'
        ));
    }

    /**
     * Update the user's profile information, avatar, and credentials.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $validated = $request->validated();
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Manejar subida de archivo de foto de perfil
        if ($request->hasFile('avatar_file')) {
            $file = $request->file('avatar_file');
            $extension = $file->getClientOriginalExtension();
            $filename = 'avatar_' . $user->id . '_' . time() . '.' . $extension;
            
            $destinationPath = public_path('uploads/avatars');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            // Eliminar avatar anterior si era un archivo subido
            if ($user->avatar && str_starts_with($user->avatar, '/uploads/avatars/')) {
                $oldPath = public_path(ltrim($user->avatar, '/'));
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $file->move($destinationPath, $filename);
            $user->avatar = '/uploads/avatars/' . $filename;
        } elseif ($request->filled('avatar_preset')) {
            // Manejar selección de avatar predeterminado
            $user->avatar = $request->input('avatar_preset');
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Eliminar avatar si era un archivo subido
        if ($user->avatar && str_starts_with($user->avatar, '/uploads/avatars/')) {
            $oldPath = public_path(ltrim($user->avatar, '/'));
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
