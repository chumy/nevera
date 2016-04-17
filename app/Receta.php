<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = ['nombre','categoria_id','user_id'];

    public function categoria()
    {
      return $this->belongsTo(Categoria::class);
    }

    public function pasos()
    {
      return $this->hasMany(Paso::class);
    }

    public function user()
    {
          return $this->belongsTo(User::class);
    }

}
