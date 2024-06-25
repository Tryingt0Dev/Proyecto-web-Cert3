<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $table = 'ordenes';
    protected $fillable = ['user_id', 'total'];

    public function libroOrden()
    {
        return $this->hasMany(LibroOrden::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function libros(){
        return $this->belongsToMany(Libro::class)->withPivot('cantidad');
    }
}
