<?php
class DbConnect
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'root', '');
        return $db;
    }
}