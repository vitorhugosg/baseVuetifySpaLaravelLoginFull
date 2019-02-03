<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_user extends Model
{
	protected $table = 'type_users';
 	protected $fillable = [
        'name', 'type_view'
    ];

    public function users()
	{
	    return $this->hasMany('App\User');
	}
}
