<?php

namespace App\Calculator;

class Calculator
{
    private $operations = [];

    public function setOperation(OperationInterface $operation): void
    {
        $this->operations[] = $operation;
    }

    public function setOperations(array $operations): void
    {
        $filteredOperations = array_filter($operations, function ($operation) {
            // if (! $operation instanceof OperationInterface) {
            //     return false;
            // }

            // return true;
            return $operation instanceof OperationInterface;
        });

        // foreach ($operations as $index => $operation) {
        //     if (! $operation instanceof OperationInterface) {
        //         unset($operations[$index]);
        //     }
        // }

        $this->operations = array_merge($this->operations, $filteredOperations);
    }

    public function getOperations(): array
    {
        return $this->operations;
    }

    public function calculate()
    {
        if (count($this->operations) > 1) {
            // $result = NULL;

            // foreach ($this->operations as $operation) {
            //     $result[] = $operation->calculate();
            // }

            // return $result;
            return array_map(function ($operation) {
                return $operation->calculate();
            }, $this->operations);
        }

        return $this->operations[0]->calculate();
    }
}