<?php
require_once 'php/models/Product.php';

$products = [
    new Product(1, "Carrots", 11.5, 'images/img-pro-01.jpg', ProductStatus::SALE),
    new Product(2, "Tomatoes", 12, 'images/img-pro-02.jpg', ProductStatus::NEW),
    new Product(3, "Grapes", 14.30, 'images/img-pro-03.jpg', ProductStatus::SALE),
    new Product(4, "Banana", 14.30, 'images/img-pro-03.jpg', ProductStatus::SALE),
    new Product(5, "Strawberry", 14.30, 'images/img-pro-03.jpg', ProductStatus::NEW),
    new Product(6, "Melon", 14.30, 'images/img-pro-03.jpg', ProductStatus::NEW)
];
