<?php

namespace Nevera;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = ['nombre'];

    public function categoria()
    {
      return $this->belongsTo(Categoria::class);
    }

    public function pasos()
    {
      return $this->hasMany(Paso::class);
    }

    public function usuario()
    {
          return $this->belongsTo(User::class);
    }

    public function ingredientes()
    {
        return $this->hasMany(RecetaIngrediente::class);
    }
}
