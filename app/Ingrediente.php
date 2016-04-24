<?php

namespace Nevera;

use Illuminate\Database\Eloquent\Model;
use Nevera\Receta;

class Ingrediente extends Model
{
    protected $fillable = ['nombre'];

    public function recetas()
    {
        return $this->belongsToMany(RecetaIngrediente::class);
    }
}
