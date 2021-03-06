<?php

class Shop extends Controller
{
    public function index()
    {
        require_once "./php/models/ProductManager.php";

        $productManager = new ProductManager;
        $products = $productManager->getProducts();

        require_once "./php/views/shop/shop.php";
    }

    public function addItemToCart(int $productId)
    {
        require_once "./php/models/CartManager.php";
        $cartManager = new CartManager();
        $cartManager->addCartItem($productId);
        header('Location: ?controller=shop');
    }

    public function shopDetail()
    {
        require_once "./php/views/shop/shop-detail.php";
    }

    public function cart()
    {
        require_once "./php/models/CartManager.php";
        $cartManager = new CartManager();
        $cartItems = $cartManager->getCartItems(); 

        require_once "./php/models/ProductManager.php";
        $productManager = new ProductManager;
        $products = $productManager->getProducts();

        foreach ($cartItems as $cartItem) {
            $productsWithMatchId = array_filter($products, function ($product) use($cartItem) {
                return $product->id == $cartItem->productId;
            });
            $isInArray = count($productsWithMatchId) > 0;
            if ($isInArray) {
                $product = reset($productsWithMatchId);
                $cartItem->product = $product;
            }
        }
        
        require_once "./php/views/shop/cart.php";
    }

    public function remove(int $productId)
    {
        require_once "./php/models/CartManager.php";
        $cartManager = new CartManager();
        $cartManager->removeCartItem($productId);
        header('Location: ?controller=shop&action=cart');
    }


    public function checkout()
    {
        require_once "./php/views/shop/checkout.php";
    }

    public function wishlist()
    {
        require_once "./php/views/shop/wishlist.php";
    }
}
