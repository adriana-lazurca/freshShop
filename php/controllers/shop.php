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

    public function shopDetail()
    {
        require_once "./php/views/shop/shop-detail.php";
    }

    public function cart()
    {
        require_once "./php/views/shop/cart.php";
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
