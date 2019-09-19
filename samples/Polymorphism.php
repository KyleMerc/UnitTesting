<?php

class First
{
    public static function action(): void
    {
        // echo "static\n";
        $this->pubLol();

    }

    public function pubLol(): void
    {
        // self::action();
        echo "non static";
    }
}

$obj = new First();
First::action();