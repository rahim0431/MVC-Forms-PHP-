<?php

require_once 'models/user.php';

if (isset($_SESSION['user_id'])) 
{
    header("Location: editname");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    if(user::findByEmail($email))
    {
        $message = "Account Already Exists";
        $link = "register";
        $linkText = "Try Again";
        include 'views/message.html';
        exit();
    }
    else
    {
        if(user::create($name, $email, $hashedpassword))
        {
            $message = "Registration Successful";
            $link = "login";
            $linkText = "Login Now";
        }
        else
        {
            $message = "Registration Failed";
            $link = "register";
            $linkText = "Try Again";
        }
        include 'views/message.html';
        exit();
    }

}

include 'views/register.html';

?>