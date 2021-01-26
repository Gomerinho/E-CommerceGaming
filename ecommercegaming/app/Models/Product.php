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
        'price',
        'stock',
        'img_product',
        'activation_code',
    ];

    public function vente()
    {
        return $this->hasMany(Vente::class);
    }
}
