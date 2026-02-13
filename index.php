<?php
session_start();

$url = $_GET['url'] ?? 'login';

switch ($url) 
{
    case 'login':
        require 'controllers/login.php';
        break;

    case 'register':
        require 'controllers/Register.php';
        break;

    case 'editname':
        require 'controllers/editname.php';
        break;

    case 'logout':
        require 'controllers/logout.php';
        break;

    default:
        echo "404 Page Not Found";
}
