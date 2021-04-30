<?php

abstract class Controller
{
    protected User $user;

    function __construct()
    { 
        if (isset($_SESSION["user"]))
        {
            $this->user = $_SESSION["user"];
        }
    }
}
