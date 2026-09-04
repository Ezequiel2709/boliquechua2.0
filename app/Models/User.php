<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'vidas',
        'racha_dias',
        'puntuacion_total',
        'avatar',
        'vidas_updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'vidas_updated_at' => 'datetime',
        ];
    }

    /**
     * Regenera las vidas del usuario basado en el tiempo transcurrido (1 vida cada 10 mins).
     */
    public function regenerarVidas(): void
    {
        if ($this->vidas < 5) {
            if ($this->vidas_updated_at) {
                $minutesPassed = now()->diffInMinutes($this->vidas_updated_at);
                if ($minutesPassed >= 2) {
                    $vidasToAdd = floor($minutesPassed / 2);
                    $this->vidas = min(5, $this->vidas + $vidasToAdd);
                    
                    if ($this->vidas == 5) {
                        $this->vidas_updated_at = null;
                    } else {
                        $this->vidas_updated_at = (clone $this->vidas_updated_at)->addMinutes($vidasToAdd * 2);
                    }
                    $this->save();
                }
            } else {
                // Fallback de seguridad: si las vidas son menores a 5 pero el contador no inició
                $this->vidas_updated_at = now();
                $this->save();
            }
        } elseif ($this->vidas >= 5 && !is_null($this->vidas_updated_at)) {
            $this->vidas_updated_at = null;
            $this->save();
        }
    }
}