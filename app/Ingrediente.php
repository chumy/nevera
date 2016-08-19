<?php

namespace Nevera;

use Illuminate\Database\Eloquent\Model;


class Ingrediente extends Model
{
    protected $fillable = ['nombre'];

    public function recetas()
    {
        //return $this->belongsToMany(RecetaIngrediente::class);
        //return $this->belongsToMany(Receta::class,'receta_ingredientes');
        return $this->hasManyThrough(Receta::class, ListadoIngredientes::class, 'ingrediente_id','id');
    }

    /*
	* Function listadoRecetas
	*
	* Funcion que relaciona los ingredientes con las recetas
	*
	* @return Array ListadoIngredientes
	*/
    public function listadoRecetas()
    {
        return $this->hasMany(ListadoIngredientes::class);
    }

}
