<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proforma extends Model
{
    use HasFactory;

    public function producto()
    {
        return $this->belongsTo('App\Models\producto','id');
    }
}
