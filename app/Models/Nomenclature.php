<?php

namespace App\Models;


use App\Modules\ShoppingBasket\CanBeBought;
use App\Modules\ShoppingBasket\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nomenclature extends Model implements Buyable
{
    use SoftDeletes;
    use CanBeBought;

    protected $fillable = ['title', 'category_id', 'price_retail', 'price_procurement', 'description', 'image'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceAttribute()
    {
        return $this->price_retail;
    }


}
