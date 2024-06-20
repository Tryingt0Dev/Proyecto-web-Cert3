<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroOrden extends Model
{
    use HasFactory;
    protected $table = 'libro_orden';
    protected $fillable = ['orden_id', 'libro_id', 'cantidad'];

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}
