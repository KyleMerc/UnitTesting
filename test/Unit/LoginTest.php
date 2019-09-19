<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        $this->user = new \App\Support\Login;
    }

    /** @test */
    public function user_exist(): void
    {
        $this->user->username = 'admin';
        $this->user->password = '$2y$10$Aw0PL7ZF34KvxKR2Xh71V.P5D4cE4pzx.vL/2fz/WAKVfYXTSz0Xe';

        $result = $this->user->checkUser();

        $this->assertEquals(1, $result);
    }
    
    /** @test */
    public function user_invalid_password(): void
    {
        $this->assertTrue($this->user->invalidPassword());
    }
}