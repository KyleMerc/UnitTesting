<?php

namespace App\Support;

require_once $_SERVER['DOCUMENT_ROOT'] .'vendor/autoload.php';
use App\Support\Connection;

class Sample extends Connection
{
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        
        if ($numRows > 0) echo "Users found\n";
        else echo "No users found";
    }
}

$obj = new Sample;
$obj->getAllUsers();