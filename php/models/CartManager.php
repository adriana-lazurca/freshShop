<?php
require_once "./php/models/CartItem.php";

class CartManager
{
    public function getCartItems()
    {
        $product = new Product(1, "Carrots", 11.5, 'images/img-pro-01.jpg', ProductStatus::SALE);
        $cartItem = new CartItem($product, 2);

        return [$cartItem];
    }

    public function addCartItem(int $productId, int $quantity)
    {
    }

    public function updateItemQuantity(int $productId, int $quantity)
    {
    }

    public function removeCartItem(int $productId)
    {
    }
}
