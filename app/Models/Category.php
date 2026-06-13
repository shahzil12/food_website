<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'image'];

    // A Category has many Products
    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}