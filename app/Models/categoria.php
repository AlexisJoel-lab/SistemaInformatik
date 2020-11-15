<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','descripcion'];

    /* protected static function boot()
    {
        parent::boot();
        self::creating(function($table){
            if (!app()->runningInConsole()) {
                $table->user_id = auth()->id();
            }
        });
    } */

    //Query Scope
    public function scopeNombre($query,$nombre)
    {
        if ($nombre) {
            return $query->where('nombre','LIKE',"%$nombre%");
        }
    }
    /* 
    public function scopeDescripcion($query,$descripcion)
    {
        if ($descripcion) {
            return $query->orWhere('descripcion','LIKE',"%$descripcion%");
        }
    } */
}
