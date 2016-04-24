<?php

namespace Nevera;

use Illuminate\Database\Eloquent\Model;
use Nevera\Receta;
use Nevera\Ingrediente;

class RecetaIngrediente extends Model
{
    protected $fillable = ['nombre','cantidad','medida'];

    public function recetas()
    {
        return $this->belongsTo(Receta::class);
    }
    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class);
    }
}
