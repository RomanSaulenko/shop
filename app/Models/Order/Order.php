<?php


namespace App\Models\Order;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    /**
     * @inheridoc
     */
    protected $fillable = ['client_id', 'delivery_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function totalPrice()
    {
        return $this->products->reduce(function($res, $product) {
            return $res + $product->price * $product->quantity;
        }, 0);
    }

    public function client()
    {
        return $this->belongsTo();
    }
}
