<?php
require_once "./php/models/CartItem.php";

class CartManager
{
    private string $cookieName = "shoppingCart";

    public function getCartItems()
    {
        $product = new Product(1, "Carrots", 11.5, 'images/img-pro-01.jpg', ProductStatus::SALE);
        $cartItem = new CartItem($product, 2);

        return [$cartItem];
    }

    public function addCartItem(int $productId)
    {
        // 1. iau datele din cookie
        $cookieValue = isset($_COOKIE[$this->cookieName]) ? $_COOKIE[$this->cookieName] : "[]";
        $data = json_decode($cookieValue, true);

        // 2. modific datele - lucru cu array
        $cartItem = new CartItem($productId, 1);
        array_push($data, $cartItem);

        // 3. salvez datele modificate in cookie 
        $dataString = json_encode($data);
        setcookie($this->cookieName, $dataString);
    }

    public function updateItemQuantity(int $productId, int $quantity)
    {
    }

    public function removeCartItem(int $productId)
    {
    }
}
