<?php
require_once "./php/models/Product.php";

class CartItem
{
    public Product $product;

    public int $productId;

    public int $quantity;

    function __construct(Product|int $product, int $quantity)
    {
        if (is_a($product, "Product")) {
            $this->product = $product;
        } else {
            $this->productId = $product;
        }

        $this->quantity = $quantity;
    }
}
