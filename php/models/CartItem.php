<?php
require_once "./php/models/Product.php";

class CartItem
{
    public Product $product;

    public int $quantity;

    function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }
}


