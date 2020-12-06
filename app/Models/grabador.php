<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grabador extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','descripcion','precio'];

    public function scopeNombre($query,$nombre)
    {
        if ($nombre) {
            return $query->where('nombre','LIKE',"%$nombre%");
        }
    }
}
