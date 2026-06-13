<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'delivery_boy_id', 'status', 
        'total_amount', 'payment_mode', 'address'
    ];

    // Belongs to a Customer
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   

    // Has many items inside (Burgers, Drinks)
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}