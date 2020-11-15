<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','descripcion','precio','categoria_id'];

    public function categoria()
    {
        return $this->belongsTo('App\Models\categoria','id');
    }

    public function scopeNombre($query,$nombre)
    {
        if ($nombre) {
            return $query->where('nombre','LIKE',"%$nombre%");
        }
    }
}
