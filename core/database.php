<?php
class database 
    {
    public static function connect() 
    {
    
        require __DIR__ . '/../config.php';

        $connection = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($connection->connect_error) 
        {
            die("Database connection failed: " . $connection->connect_error);
        }
        return $connection;
    }
}
?>