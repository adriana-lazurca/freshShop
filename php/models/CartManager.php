<?php
require_once "./php/models/CartItem.php";

class CartManager
{
    private string $cookieName = "shoppingCart";

    public function getCartItems()
    {
        // 1. take data from cookie
        $cookieValue = isset($_COOKIE[$this->cookieName]) ? $_COOKIE[$this->cookieName] : "[]";
        $data = json_decode($cookieValue); // list of cartItem
        
        return $data;
    }

    public function addCartItem(int $productId)
    {
        // 1. take data from cookie
        $cookieValue = isset($_COOKIE[$this->cookieName]) ? $_COOKIE[$this->cookieName] : "[]";
        $data = json_decode($cookieValue); // list of cartItem

        // 2. modify data - work with array
        $productsWithMatchId = array_filter($data, function ($cartItem) use ($productId) {
            return $cartItem->productId == $productId;
        });

        $isInArray = count($productsWithMatchId) > 0;

        if ($isInArray) {
            $cartItem = reset($productsWithMatchId);
            $cartItem->quantity += 1;
        } else {
            $cartItem = new CartItem($productId, 1);
            array_push($data, $cartItem);
        }

        // 3. save modified data in cookie 
        $dataString = json_encode($data);
        setcookie($this->cookieName, $dataString);
    }

    public function updateItemQuantity(int $productId, int $quantity)
    {
    }

    public function removeCartItem(int $productId)
    {
        // 1. take data from cookie
        $cookieValue = isset($_COOKIE[$this->cookieName]) ? $_COOKIE[$this->cookieName] : "[]";
        $data = json_decode($cookieValue); // list of cartItem

        // 2. modify data - work with array
        $data = array_filter($data, function ($cartItem) use ($productId) {
            return $cartItem->productId != $productId;
        });

        // 3. save modified data in cookie 
        $dataString = json_encode($data);
        setcookie($this->cookieName, $dataString);
    }
}
