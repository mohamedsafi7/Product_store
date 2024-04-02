<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'image',
        'price',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
