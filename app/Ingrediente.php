<?php

namespace Nevera;

use Illuminate\Database\Eloquent\Model;


class Ingrediente extends Model
{
    protected $fillable = ['nombre'];

    public function recetas()
    {
        //return $this->belongsToMany(RecetaIngrediente::class);
        return $this->belongsToMany(Receta::class,'receta_ingredientes');
    }
}
