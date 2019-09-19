<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
    private $user;

    public function setUp(): void
    {
        $this->user = new \App\Models\User;
    }

    /**
     * @test
     */ 
    public function that_we_can_get_first_name(): void
    {
        // $user = new \App\Models\User;

        $this->user->setFirstName('kyle');

        $this->assertEquals($this->user->getFirstName(), 'kyle');
    }

    public function testThatWeCanGetLastName(): void
    {
        // $user = new \App\Models\User;

        $this->user->setLastName('mercado');

        $this->assertEquals($this->user->getLastName(), 'mercado');
    }

    public function testFullNameIsReturned(): void
    {
        $user = new \App\Models\User;
        $user->setFirstName('kyle');
        $user->setLastName('mercado');

        $this->assertEquals($user->getFullName(), 'kyle mercado');
    }

    public function testFirstAndLastNameAreTrimmed(): void
    {
        $user = new \App\Models\User;

        $user->setFirstName('  kyle ');
        $user->setLastName(' mercado  ');

        $this->assertEquals($user->getFirstName(), 'kyle');
        $this->assertEquals($user->getLastName(), 'mercado');
    }

    public function testEmailAddressCanBeSet(): void
    {
        $user = new \App\Models\User;

        $user->setEmail('kyle@123.com');

        $this->assertEquals($user->getEmail(), 'kyle@123.com');
    }

    public function testEmailVariablesContainsCorrectValues(): void
    {
        $user = new \App\Models\User;

        $user->setFirstName('kyle');
        $user->setLastName('mercado');
        $user->setEmail('kyle@123.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'kyle mercado');
        $this->assertEquals($emailVariables['email'], 'kyle@123.com');
    }
}