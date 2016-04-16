<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paso extends Model
{
  public function recetas()
  {
    return $this->belongsTo(Receta::class);
  }
}
