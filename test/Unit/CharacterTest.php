<?php

use PHPUnit\Framework\TestCase;

class Charactertest extends TestCase
{
    private $character;

    public function setUp(): void
    {
        $this->character = new \App\Models\Character;
    }

    /** @test */
    public function can_set_all_property(): void
    {
        $this->character->name = 'Frankenstein';
        $this->character->charType = 'SuperModifiedHuman';
        $this->character->weaponType = 'Dark Spear';

        $this->assertEquals($this->character->name, 'Frankenstein');
        $this->assertEquals($this->character->charType, 'SuperModifiedHuman');
        $this->assertEquals($this->character->weaponType, 'Dark Spear');
        $this->assertEquals($this->character->health, 100);

        $this->assertInternalType('array', $this->character->name);
    }
}