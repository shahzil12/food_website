<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $fillable = ['title', 'category', 'description', 'price', 'image'];

    // A Product belongs to a Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
