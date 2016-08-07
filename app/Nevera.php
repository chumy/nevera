<?php

namespace Nevera;

use Illuminate\Database\Eloquent\Model;

class Nevera extends Model
{
    //protected $fillable=['ingrediente_id','user_id'];

    public function usuario()
  {
    return $this->belongsTo(User::class);
  }
}
