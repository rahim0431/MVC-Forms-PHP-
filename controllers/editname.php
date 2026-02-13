<?php    

    require_once 'models/user.php';

    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: login");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {   

        if (isset($_POST['newname'])) 
        {
            $newname = $_POST['newname'];
        } 
        else 
        {
            die("Error: Please enter a new username.");
        }

        $userid = $_SESSION['user_id'];

        if(user::updateName($userid, $newname))
        {
            $message = "Username Changed Successfully";
            $link = "login";
            $linkText = "Go Back";
            $logoutLink = "logout";
            $logoutLinkText = "Logout";
            include 'views/message.html';
            exit;
        }
        else
        {
            $message = "Username Update Failed";
        }
    }

    include 'views/editname.html';

?>