<?php
require_once './php/models/UserManager.php';
require_once './php/models/User.php';

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
        $userManager = new UserManager;

        $userData = $userManager->getUser($email);

        $dbPassword = $userData == false ? "" : $userData['password'];

        $isPasswordOk = password_verify($password, $dbPassword);

        if ($isPasswordOk) {
            $user = new User;

            $user->id = $userData['id'];
            $user->firstName = $userData['first_name'];
            $user->lastName = $userData['last_name'];
            $user->email = $userData['email'];
            $user->password = $userData['password'];

            $_SESSION['user'] = $user;

            header('Location: index.php');
        } else {
            header('Location: ?controller=myAccount&action=signIn&error');
        }
    }

    public function validateUserRegistration(
        string $firstName,
        string $lastName,
        string $email,
        string $password,
        string $rePassword
    ) {
        $allFieldsAreFilled = !empty($firstName) && !empty($lastName) && !empty($email) && !empty($password) && !empty($rePassword);

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

        $cost = ['cost' => 12];
        $password = password_hash($password, PASSWORD_BCRYPT, $cost);

        $userManager->insertUser($firstName, $lastName, $email, $password);

        header('Location: ?controller=myAccount&action=signIn');
    }
}
