<?php


namespace App\Models\Order;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @inheridoc
     */
    protected $fillable = ['client_id', 'delivery_id'];
}
