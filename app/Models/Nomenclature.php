<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Nomenclature extends Model
{
    protected $fillable = ['title', 'category_id', 'price_retail', 'price_procurement'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}