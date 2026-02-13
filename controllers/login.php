<?php

require_once 'models/user.php';

if (isset($_SESSION['user_id'])) 
{
    header("Location: editname");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $row = user::findByEmail($email);

    if ($row) 
    {

        if (password_verify($password, $row['Password'])) 
        {
            $_SESSION['user_id'] = $row['id'];
            
            $message = "Login Successful!";
            $link = "editname";
            $linkText = "Change Username";

            $logoutLink = "logout";
            $logoutLinkText = "Logout";
            include 'views/message.html';
            exit;
        } 
        else 
        {
            $message = "Wrong Password!";
            $link = "login";
            $linkText = "Try Again";
            include 'views/message.html';
            exit;
        }
    } 
    else 
    {   
        $message = "Please Enter Valid E-mail";
        $link = "login";
        $linkText = "Correct E-mail";
        include 'views/message.html';
        exit;
    }
}

include 'views/login.html';

?>