<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = [
        'user_id', 'name', 'ingredients', 'description', 'price', 'img', 'visible'
    ];

    protected $hidden = [
        'id', 'user_id'
    ];

    // COLLEGAMENTO TABELLE USER - PLATE (ONE TO MANY)
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
