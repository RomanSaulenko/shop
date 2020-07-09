<?php


namespace App\Adapters\Cart;


use App\Models\Order\OrderProduct;

class CartItemToOrderProductAdapter extends OrderProduct
{
    public $columnMap = [
        'id' => 'nomenclature_id',
        'qty' => 'quantity',
        'price' => 'price'
    ];
    public function __construct(array $attributes = [])
    {
        $orderProductAttributes = $this->convertColumns($attributes);

        parent::__construct($orderProductAttributes);
    }

    public function convertColumns(array $attributes = [])
    {
        $newOrderProductAttributes = [];

        foreach ($attributes as $column => $value) {
            foreach ($this->columnMap as $cartItemCol => $orderProductCol) {
                if ($column === $cartItemCol) {
                    $newOrderProductAttributes[$orderProductCol] = $value;
                }
            }
        }

        return $newOrderProductAttributes;
    }
}
