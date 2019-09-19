<?php

class CalculatorTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function can_set_single_operation(): void
    {
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($addition);

        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function can_set_multiple_operations(): void
    {
        $addition1 = new \App\Calculator\Addition;
        $addition1->setOperands([5, 10]);

        $addition2 = new \App\Calculator\Addition;
        $addition2->setOperands([2, 3]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }

    /** @test */
    public function operations_are_ignored_if_not_instance_of_operation_interface(): void
    {
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$addition, 'cats', 'mice']);

        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function can_calculate_result(): void
    {
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($addition);

        $this->assertEquals(15, $calculator->calculate());
    }

    /** @test */
    public function calculate_methods_returns_multiple_results(): void
    {
        $addition1 = new \App\Calculator\Addition;
        $addition1->setOperands([5, 10]); // 15

        $division = new \App\Calculator\Division;
        $division->setOperands([50, 2]); // 25

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$addition1, $division]);

        $this->assertInternalType('array', $calculator->calculate());
        $this->assertEquals(15, $calculator->calculate()[0]);
        $this->assertEquals(25, $calculator->calculate()[1]);
    }
}