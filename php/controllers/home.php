<?php

class Home extends Controller
{
    public function index()
    {
        $user = $_SESSION["user"];
        require_once "./php/views/home/index.php";
    }
}
