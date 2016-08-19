<?php

namespace Nevera;

use Illuminate\Database\Eloquent\Model;

class ListadoIngredientes extends Model
{
    protected $fillable = ['cantidad'];

    public function getIngrediente()
    {
    	return Ingrediente::find($this->ingrediente_id);
    }

    public function getMedida()
    {
    	return Medida::find($this->medida_id);
    }

    public function getReceta()
    {
    	return Receta::find($this->receta_id);
    }
}
