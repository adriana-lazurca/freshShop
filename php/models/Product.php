<?php

abstract class ProductStatus
{
    const NEW = "New";
    const SALE = "Sale";
}

class Product
{
    public int $id;
    public string $name;
    public float $price;
    public string $imageUrl;
    public string $status;

    function __construct(int $id, string $name, float $price, string $imageUrl, string $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->imageUrl = $imageUrl;
        $this->status = $status;
    }
}
