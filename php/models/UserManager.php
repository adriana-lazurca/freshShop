<?php
require_once 'Manager.php';

class UserManager extends Manager
{
    public function insertUser($firstName, $lastName, $email, $password)
    {
        $db = $this->dbConnect();

        $sql = 'INSERT INTO users(first_name, last_name, email, password) VALUES(?, ?, ?, ?)';
        $users = $db->prepare($sql);

        $users->execute(array($firstName, $lastName, $email, $password));
    }

    function checkUserExists($email) {
        $db = $this->dbConnect();
    
        $request = $db->query("SELECT email FROM users WHERE email = '$email' ");
        
        $affectedRows = $request->rowCount();
        $userExists = $affectedRows > 0;
    
        return $userExists;
    }
}
