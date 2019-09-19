<?php

namespace App\Support;

// use \mysqli;

class Connection
{
    private $dbUser;
    private $dbPass;
    private $dbName;
    private $dbServer;
    
    public function connect()
    {
        $this->dbUser   = 'root';
        $this->dbPass   = '';
        $this->dbName   = 'tododb';
        $this->dbServer = '127.0.0.1';

        $conn = new \mysqli($this->dbServer, $this->dbUser, $this->dbPass, $this->dbName);

        if ($conn->connect_errno > 0)
         die('Unable to connect to database' . $conn->connect_error . "\n");

        return $conn;
    }    
}