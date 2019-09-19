<?php

abstract class Creator
{
    abstract public function factoryMethod(): Product;

    public function someOperation(): string
    {
        $product = $this->factoryMethod();
        
        $result = " Creator: The same creator's code has just worked with\n" . $product->operation();

        return $result;
    }
}

class ConcreteCreator1 extends Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProduct1();
    }
}

class ConcreteCreator2 extends Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProduct2();
    }
}

interface Product
{
    public function operation(): string;
}

class ConcreteProduct1 implements Product
{
    public function operation(): string
    {
        return "{Result in Concrete Product 111111}";
    }
}

class ConcreteProduct2 implements Product
{
    public function operation(): string
    {
        return "{Result in Concrete Product 22222}";
    }
}

function clientCode(Creator $creator): void {
    echo "Client: I'm not aware of creator's class" . $creator->someOperation() . "\n";
}


clientCode(new ConcreteCreator2);