<?php

require_once 'core/database.php';

class user
{
    public static function findByEmail($email)
    {
        $db = database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($name, $email, $password)
    {
        $db = database::connect();
        $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);
        return $stmt->execute();
    }

    public static function updateName($id, $newName)
    {
        $db = database::connect();
        $stmt = $db->prepare("UPDATE users SET name = ? WHERE id = ?");
        $stmt->bind_param("si", $newName, $id);
        return $stmt->execute();
    }
}
?>

