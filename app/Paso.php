<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paso extends Model
{
  protected $fillable=['orden','descripcion'];

  public function recetas()
  {
    return $this->belongsTo(Receta::class);
  }

  public function setOrden($orden)
  {
    $this->orden = $orden;
  }
}
