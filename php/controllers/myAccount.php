<?php

class myAccount extends Controller
{
    public function index()
    {
        require_once "./php/views/myAccount/myAccount.php";
    }

    public function signIn()
    {
        require_once "./php/views/myAccount/signIn.php";
    }

    public function register()
    {
        require_once "./php/views/myAccount/register.php";
    }
}
