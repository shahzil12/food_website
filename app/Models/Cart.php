<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'food_id', 'quantity']; // food_id kar diya

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food() // Function ka naam change kiya
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
}