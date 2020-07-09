<?php


namespace App\Models\Order;


use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'order_products';

    /**
     * {@inheritdoc}
     */
    protected $fillable = ['order_id', 'nomenclature_id', 'price', 'quantity'];


}
