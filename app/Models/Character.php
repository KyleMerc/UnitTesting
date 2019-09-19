<?php

namespace App\Models;

// require_once $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php';

class Character
{
    private $name;
    private $charType;
    private $weaponType;
    private $health;
    private const BASE_HEALTH = 100;
    
    public function __construct()
    {
        $this->health = self::BASE_HEALTH;
    }

    public function __set($prop, $value): void
    {
        if (property_exists($this, $prop))
            $this->$prop = $value;
        else
            echo "Property not found";
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function createUser(): \App\Models\User
    {
        return new \App\Models\User;
    }
}

$obj = new Character;
$user = $obj->createUser();
$user->setFirstName('kyle');
$user->setLastName('mercado');
echo $user->getFullName() . "\n";