<?php
require_once 'DbConnect.php';

class User extends DbConnect
{
    public function insertUser()
    {
        $db = $this->dbConnect();
    }
}
