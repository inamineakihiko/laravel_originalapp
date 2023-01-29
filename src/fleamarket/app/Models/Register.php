<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $table = "items";

    protected $fillable = [
        'item_image',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}