<?php

namespace Nevera;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    protected $fillable  = ['nombre'];

   /* public function getListados()
    {
    	return $this->hasManyThrough(Ingrediente::class, ListadoIngredientes::class, 'receta_id', 'id');
    }*/
}
