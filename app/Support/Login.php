<?php

namespace App\Support;

require_once $_SERVER['DOCUMENT_ROOT'] .'vendor/autoload.php';

use App\Support\Connection;

class Login extends Connection
{
    private $username;
    private $password;
    private $email;

    public function __set($prop, $value)
    {
        if (property_exists($this, $prop))
            $this->$prop = $value;
        else
            echo "Property not found";
    }

    public function __get($prop)
    {
        if (property_exists($this, $prop))
            return $this->$prop;
        else
            echo "Property not found";
    }

    public function __toString()
    {
        return "Logging in User: {$this->username} with password: {$this->password}";
    }

    public function checkUser(): int
    {
        $sql = "SELECT * FROM users
                WHERE username = '{$this->username}' AND password='{$this->password}'";
        $result = $this->connect()->query($sql);
        
        return $result->num_rows;
    }

    public function invalidPassword(): bool
    {
        $sql = "SELECT * FROM users
                WHERE username = '{$this->username}' AND password='{$this->password}'";
    }
}