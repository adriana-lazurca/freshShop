<?php

class ProductManager
{
    public function getProducts()
    {
        require_once './php/samples/products.php';
        return $products;
    }
}
