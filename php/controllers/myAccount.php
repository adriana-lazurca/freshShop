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

    public function signOut()
    {
        session_destroy();
        header('Location:index.php');
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

        // //alternative
        // $messages = [
        //     "password" => "Passwords don't match",
        //     "email" => "Invalid email"
        // ];
        // $message = array_key_exists($error, $messages) ? $messages[$error] : null;

        require_once "./php/views/myAccount/register.php";
    }

    public function validateUserSignIn(string $email, string $password)
    {
        // $userExists = checkUserExists($email, $password);
        $userExists = true;

        if ($userExists) {
            $_SESSION["email"] = $email;
            header('Location: index.php');
        } else {
            header('Location: ?controller=myAccount&action=signIn&error');
        }
    }

    public function validateUserRegistration(string $firstName, string $lastName, string $username, string $email, string $password, string $rePassword)
    {
        // $userExists = checkUserExists($username, $password);
        $registrationIsFilled = false;

        $userExists = false;

        if ($password != $rePassword) {
            $error = "password";
        }

        $isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$isEmailValid) {
            $error = "email";
        }

        if ($userExists) {
            $error = "already";
        }

        if ($registrationIsFilled) {
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["firstName"] = $firstName;
            $_SESSION["lastName"] = $lastName;
            
            header('Location: ?controller=myAccount&action=signIn');
        } else {
            header("Location: ?controller=myAccount&action=register&error=$error");
        }
    }
}
