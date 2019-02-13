<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
  protected $fillable = [
        'description', 'type_view'
    ];

    public function users()
  {
      return $this->hasMany('App\Models\User\User');
  }
}
