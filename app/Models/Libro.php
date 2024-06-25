<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'autor', 'stock', 'descripcion','precio', 'imagen'];

    protected $table = 'libro';


    public function ordenes(){
        return $this->belongsToMany(Orden::class, 'libro_orden', 'libro_id', 'orden_id')->withPivot('cantidad');
    }
}
