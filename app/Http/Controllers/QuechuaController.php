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

        if ($usuario) {
            $usuario->regenerarVidas();
        }

        $racha = $usuario->racha_dias ?? 0;
        $puntuacion = $usuario->puntuacion_total ?? 0;
        $vidas = $usuario->vidas ?? 5;
        $nombreUsuario = $usuario->name ?? 'Usuario';
        $avatar = $usuario->avatar ?? null;

        return view('index', compact('categorias', 'nombreUsuario', 'racha', 'puntuacion', 'vidas', 'avatar', 'usuario'));
    }

    /**
     * Mostrar la montaña de niveles para una categoría.
     */
    public function niveles(int $id): View|RedirectResponse
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return redirect()->route('categorias')->with('error', 'La categoría no existe.');
        }

        $usuario = auth()->user();
        if ($usuario) {
            $usuario->regenerarVidas();
        }
        
        $vidas = $usuario->vidas ?? 5;
        $puntuacion = $usuario->puntuacion_total ?? 0;
        $racha = $usuario->racha_dias ?? 0;
        $nombreUsuario = $usuario->name ?? 'Usuario';
        $avatar = $usuario->avatar ?? null;

        $circulos = \Illuminate\Support\Facades\DB::table('circulos')
            ->where('categoria_id', $categoria->id)
            ->orderBy('orden')
            ->get();
            
        $subNiveles = \Illuminate\Support\Facades\DB::table('sub_niveles')
            ->whereIn('circulo_id', $circulos->pluck('id'))
            ->orderBy('circulo_id')
            ->orderBy('orden')
            ->get();
            
        $progreso = [];
        if ($usuario) {
            $progreso = \Illuminate\Support\Facades\DB::table('user_progreso_niveles')
                ->where('user_id', $usuario->id)
                ->pluck('sub_nivel_id')
                ->toArray();
        }
        
        $nodos = [];
        $nodoActivoEncontrado = false;
        $idNodoActivoVisual = 1;

        foreach ($circulos as $i => $c) {
            $subs = $subNiveles->where('circulo_id', $c->id)->values();
            $estrellasGanadas = 0;
            $subNivelActivo = null;

            foreach ($subs as $s) {
                if (in_array($s->id, $progreso)) {
                    $estrellasGanadas++;
                } else if (!$nodoActivoEncontrado) {
                    $subNivelActivo = $s->id;
                    $nodoActivoEncontrado = true;
                    $idNodoActivoVisual = $c->orden;
                }
            }

            $estado = 'locked';
            if ($estrellasGanadas == 3) {
                $estado = 'completed';
            } else if ($subNivelActivo !== null || ($i == 0 && $estrellasGanadas == 0)) {
                $estado = 'active';
                if ($subNivelActivo === null) {
                    $subNivelActivo = $subs[0]->id;
                    $idNodoActivoVisual = $c->orden;
                    $nodoActivoEncontrado = true;
                }
            }

            $nodos[] = (object)[
                'orden' => $c->orden,
                'estrellas' => $estrellasGanadas,
                'estado' => $estado,
                'subNivelUrl' => $subNivelActivo ? route('juego', ['id' => $subNivelActivo]) . '?modo=mixto' : '#'
            ];
        }

        return view('niveles', compact('categoria', 'usuario', 'vidas', 'puntuacion', 'racha', 'nombreUsuario', 'avatar', 'nodos', 'idNodoActivoVisual'));
    }

    /**
     * Mostrar juego de un sub-nivel específico.
     */
    public function juego(int $id): View|RedirectResponse
    {
        $subNivel = \Illuminate\Support\Facades\DB::table('sub_niveles')
            ->join('circulos', 'sub_niveles.circulo_id', '=', 'circulos.id')
            ->select('sub_niveles.id as sub_nivel_id', 'circulos.categoria_id', 'circulos.orden as dificultad')
            ->where('sub_niveles.id', $id)
            ->first();

        if (!$subNivel) {
            return redirect()->route('categorias')->with('error', 'El nivel no existe.');
        }

        $categoria = Categoria::find($subNivel->categoria_id);

        // Lógica 70/30 (7 palabras nuevas, 3 de repaso)
        $newWords = Palabra::where('categoria_id', $categoria->id)
            ->where('nivel_dificultad', $subNivel->dificultad)
            ->inRandomOrder()
            ->limit(7)
            ->get();
            
        if ($subNivel->dificultad > 1) {
            $reviewWords = Palabra::where('categoria_id', $categoria->id)
                ->where('nivel_dificultad', '<', $subNivel->dificultad)
                ->inRandomOrder()
                ->limit(10 - $newWords->count())
                ->get();
        } else {
            $reviewWords = Palabra::where('categoria_id', $categoria->id)
                ->where('nivel_dificultad', $subNivel->dificultad)
                ->whereNotIn('id', $newWords->pluck('id'))
                ->inRandomOrder()
                ->limit(10 - $newWords->count())
                ->get();
        }

        $palabrasRaw = $newWords->concat($reviewWords)->shuffle();
        
        // Si aún no hay 10, rellenamos con cualquier palabra de la categoría
        if ($palabrasRaw->count() < 10) {
            $extra = Palabra::where('categoria_id', $categoria->id)
                ->whereNotIn('id', $palabrasRaw->pluck('id'))
                ->inRandomOrder()
                ->limit(10 - $palabrasRaw->count())
                ->get();
            $palabrasRaw = $palabrasRaw->concat($extra)->shuffle();
        }

        $palabras = $palabrasRaw->map(function ($p) {
            return [
                'id' => $p->id,
                'palabra_quechua' => $p->quechua ?? $p->palabra_quechua,
                'palabra_espanol' => $p->espanol ?? $p->palabra_espanol,
                'puntos' => $p->puntos ?? 10,
            ];
        });

        $usuario = auth()->user();
        if ($usuario) {
            $usuario->regenerarVidas();
        }
        
        $vidas = $usuario->vidas ?? 5;
        $puntuacion = $usuario->puntuacion_total ?? 0;
        $racha = $usuario->racha_dias ?? 0;
        $nombreUsuario = $usuario->name ?? 'Usuario';
        $subNivelId = $subNivel->sub_nivel_id;
        $dificultad = $subNivel->dificultad;

        return view('juego', compact('categoria', 'palabras', 'usuario', 'vidas', 'puntuacion', 'racha', 'nombreUsuario', 'subNivelId', 'dificultad'));
    }

    /**
     * Guardar el progreso, puntos ganados y vidas del usuario.
     */
    public function guardarProgreso(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'vidas' => ['required', 'integer', 'min:0', 'max:5'],
            'sub_nivel_id' => ['required', 'integer'],
            'xp_ganado' => ['required', 'integer', 'min:0']
        ]);

        /** @var \App\Models\User $usuario */
        $usuario = auth()->user();

        if ($usuario) {
            // Si el usuario perdió vidas o simplemente tiene menos de 5 y el temporizador está inactivo
            if ($validated['vidas'] < 5 && is_null($usuario->vidas_updated_at)) {
                $usuario->vidas_updated_at = now();
            }
            
            $usuario->puntuacion_total = ($usuario->puntuacion_total ?? 0) + $validated['xp_ganado'];
            $usuario->vidas = $validated['vidas'];
            
            // Si el usuario consiguió puntos y racha es 0, inicializar racha en 1
            if ($validated['xp_ganado'] > 0 && ($usuario->racha_dias ?? 0) === 0) {
                $usuario->racha_dias = 1;
            }

            $usuario->save();

            // Guardar en user_progreso_niveles si el usuario no perdió
            if ($validated['vidas'] > 0 && $validated['xp_ganado'] > 0) {
                \Illuminate\Support\Facades\DB::table('user_progreso_niveles')->updateOrInsert(
                    ['user_id' => $usuario->id, 'sub_nivel_id' => $validated['sub_nivel_id']],
                    ['completado_at' => now()]
                );
            }

            return response()->json([
                'success' => true,
                'puntuacion_total' => $usuario->puntuacion_total,
                'vidas' => $usuario->vidas,
                'racha_dias' => $usuario->racha_dias,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Usuario no autenticado'], 401);
    }

    /**
     * Endpoint para consultar y regenerar vidas en tiempo real (llamado por JS en background)
     */
    public function checkVidas(): JsonResponse
    {
        $usuario = auth()->user();
        if ($usuario) {
            $vidas_antes = $usuario->vidas;
            $usuario->regenerarVidas();
            $vidas_ahora = $usuario->vidas;

            return response()->json([
                'vidas' => $vidas_ahora,
                'regeneradas' => $vidas_ahora - $vidas_antes
            ]);
        }
        return response()->json(['vidas' => 0, 'regeneradas' => 0]);
    }
}