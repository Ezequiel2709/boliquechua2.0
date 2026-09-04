<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Palabra extends Model
{
    use HasFactory;

    protected $table = 'palabras';

    protected $fillable = [
        'categoria_id',
        'palabra_quechua',
        'palabra_espanol',
        'nivel_dificultad',
        'puntos',
    ];

    /**
     * Obtener la categoría a la que pertenece la palabra.
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
