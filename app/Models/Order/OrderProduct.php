<?php


namespace App\Models\Order;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use SoftDeletes;
    /**
     * {@inheritdoc}
     */
    protected $table = 'order_products';

    /**
     * {@inheritdoc}
     */
    protected $fillable = ['order_id', 'nomenclature_id', 'price', 'quantity'];


}
