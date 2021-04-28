<?php

class MyAccount extends Controller
{
    public function index()
    {
        require_once "./php/views/myAccount/myAccount.php";
    }

    public function signIn(string $error = null)
    {
        require_once "./php/views/myAccount/signIn.php";
    }

    public function register(string $error = null)
    {
        switch ($error) {
            case 'password':
                $message = "Passwords don't match";
                break;

            case 'email':
                $message = "Invalid email";
                break;

            case 'already':
                $message = "You are already registered";
                break;
        }

        require_once "./php/views/myAccount/register.php";
    }

    public function validateUser(string $username, string $password)
    {
        // $userExists = checkUserExists($username, $password);
        $userExists = false;

        if ($userExists) {
            $_SESSION["username"] = $username;
            header('Location: index.php');
        } else {
            header('Location: ?controller=myAccount&action=signIn&error');
        }
    }

    public function validateUserRegistration(string $username, string $email, string $password, string $rePassword)
    {
        // $userExists = checkUserExists($username, $password);
        $registrationIsFilled = false;
        $isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
        $userExists = false;

        if ($password != $rePassword) {
            $error = "password";
        }

        if (!$isEmailValid) {
            $error = "email";
        }

        if ($userExists) {
            $error = "already";
        }

        if ($registrationIsFilled) {
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            header('Location: ?controller=myAccount&action=signIn');
        } else {
            header("Location: ?controller=myAccount&action=register&error=$error");
        }
    }
}
