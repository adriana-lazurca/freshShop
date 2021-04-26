<?php

class Home extends Controller
{
    public function index(int $userId, string $userName)
    {
        echo 'home/index<br/>';
        echo "id: $userId<br/>";
        echo "name: $userName<br/>";
    }

    public function test()
    {
        echo 'test';
    }

    public function orice()
    {
        echo 'orice';
    }
}
