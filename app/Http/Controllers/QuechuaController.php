<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Palabra;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuechuaController extends Controller
{
    /**
     * Mostrar todas las categorías.
     */
    public function index(): View
    {
        $categorias = Categoria::orderBy('id')->get();
        $usuario = auth()->user();

        $racha = $usuario->racha_dias ?? 0;
        $puntuacion = $usuario->puntuacion_total ?? 0;
        $vidas = $usuario->vidas ?? 5;
        $nombreUsuario = $usuario->name ?? 'Usuario';
        $avatar = $usuario->avatar ?? null;

        return view('index', compact('categorias', 'nombreUsuario', 'racha', 'puntuacion', 'vidas', 'avatar', 'usuario'));
    }

    /**
     * Mostrar juego de una categoría específica.
     */
    public function juego(int $id): View|RedirectResponse
    {
        $categoria = Categoria::with('palabras')->find($id);

        if (!$categoria) {
            return redirect()->route('categorias')->with('error', 'La categoría no existe.');
        }

        $palabras = $categoria->palabras->map(function ($p) {
            return [
                'id' => $p->id,
                'palabra_quechua' => $p->quechua ?? $p->palabra_quechua,
                'palabra_espanol' => $p->espanol ?? $p->palabra_espanol,
                'puntos' => $p->puntos ?? 10,
            ];
        });
        $usuario = auth()->user();
        $vidas = $usuario->vidas ?? 5;
        $puntuacion = $usuario->puntuacion_total ?? 0;
        $racha = $usuario->racha_dias ?? 0;
        $nombreUsuario = $usuario->name ?? 'Usuario';

        return view('juego', compact('categoria', 'palabras', 'usuario', 'vidas', 'puntuacion', 'racha', 'nombreUsuario'));
    }

    /**
     * Guardar el progreso, puntos ganados y vidas del usuario.
     */
    public function guardarProgreso(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'puntos' => ['required', 'integer', 'min:0'],
            'vidas' => ['required', 'integer', 'min:0', 'max:5'],
        ]);

        /** @var \App\Models\User $usuario */
        $usuario = auth()->user();

        if ($usuario) {
            $usuario->puntuacion_total = ($usuario->puntuacion_total ?? 0) + $validated['puntos'];
            $usuario->vidas = $validated['vidas'];
            
            // Si el usuario consiguió puntos y racha es 0, inicializar racha en 1
            if ($validated['puntos'] > 0 && ($usuario->racha_dias ?? 0) === 0) {
                $usuario->racha_dias = 1;
            }

            $usuario->save();

            return response()->json([
                'success' => true,
                'puntuacion_total' => $usuario->puntuacion_total,
                'vidas' => $usuario->vidas,
                'racha_dias' => $usuario->racha_dias,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Usuario no autenticado'], 401);
    }
}