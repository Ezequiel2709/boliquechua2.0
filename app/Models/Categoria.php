<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'icono',
        'orden',
    ];

    /**
     * Obtener las palabras asociadas a la categoría.
     */
    public function palabras(): HasMany
    {
        return $this->hasMany(Palabra::class, 'categoria_id');
    }
}
