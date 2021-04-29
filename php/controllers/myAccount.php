<?php
require_once './php/models/UserManager.php';
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

            case 'empty':
                $message = "Fill all the fields";
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

    public function validateUserRegistration(string $firstName, string $lastName, string $email, string $password, string $rePassword)
    {
        $allFieldsAreFilled = false;

        if (!$allFieldsAreFilled) {
            $error = "empty";
        } else {
            $userManager = new UserManager;
            $userExists = $userManager->checkUserExists($email);

            if ($userExists) {
                $error = "already";
            } else {
                if ($password != $rePassword) {
                    $error = "password";
                } else {
                    $isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

                    if (!$isEmailValid) {
                        $error = "password";
                    }
                }
            }
        }

        if (isset($error)) {
            header("Location: ?controller=myAccount&action=register&error=$error");
            return;
        }

        $userManager->insertUser($firstName, $lastName, $email, $password);

        $_SESSION["email"] = $email;
        $_SESSION["firstName"] = $firstName;
        $_SESSION["lastName"] = $lastName;
        header('Location: ?controller=myAccount&action=signIn');
    }
}
