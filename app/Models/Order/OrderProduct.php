<?php


namespace App\Models\Order;


use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    /**
     * @inheridoc
     */
    protected $fillable = ['order_id', 'nomenclature_id', 'price', 'quantity'];


}
