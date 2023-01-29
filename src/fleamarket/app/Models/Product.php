<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "items";

    public function favorites()
    {
      return $this->hasMany('App\Models\Favorite');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function contact()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }
    
}
