<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'link', 'priority', 'bought',
    ];

    //
}
