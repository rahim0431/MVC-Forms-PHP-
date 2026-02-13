<?php
class database 
    {
    public static function connect() 
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "internpractice";

        $connection = new mysqli($servername, $username, $password, $dbname);

        if ($connection->connect_error) 
        {
            die("Database connection failed: " . $connection->connect_error);
        }
        return $connection;
    }
}
?>