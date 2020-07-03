<?php

namespace App\Models;


use App\Modules\ShoppingBucket\CanBeBought;
use App\Modules\ShoppingBucket\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;

class Nomenclature extends Model implements Buyable
{
    use CanBeBought;

    protected $fillable = ['title', 'category_id', 'price_retail', 'price_procurement'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceAttribute()
    {
        return $this->price_retail;
    }


}
