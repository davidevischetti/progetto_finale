<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'email', 'address', 'name', 'phone', 'price_total'
    ];

    public function plates() {
        return $this->belongsToMany('App\Models\Plate');
    }
}
