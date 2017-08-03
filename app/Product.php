<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const AVALIABLE_PRODUCT = 'avaliable';
    const UNAVALIABLE_PRODUCT = 'unavaliable';
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id',
    ];

    public function isAvaliable()
    {
        return $this->status == Product::AVALIABLE_PRODUCT;
    }
}
