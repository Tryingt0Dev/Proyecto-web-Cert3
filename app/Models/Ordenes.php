<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    use HasFactory;
    public function libros(){
        return $this->belongsToMany(Libro::class)->withPivot('cantidad');
    }
}
