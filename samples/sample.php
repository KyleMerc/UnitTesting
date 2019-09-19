<?php

// class Foo {
//    function myFoo() {
//       return "Foo";
//    }

//    function compute() {
//         foreach (func_get_args() as $item) {
//             echo $item . "\n";
//         }
//    }

// }

// class Bar extends Foo {
//    function myFoo() {
//       return "Bar";
//    }
// }

// $obj = new Bar();
// $obj->compute(123, "hello", ['123', 'asda', 'noioce']);
// class Classy {

//     const       STAT = 'S' ; // no dollar sign for constants (they are always static)
//     static     $stat = 'Static' ;
//     public     $publ = 'Public' ;
//     private    $priv = 'Private' ;
//     protected  $prot = 'Protected' ;
    
//     function __construct( ){  }
    
//     public function __set($property, $value): void
//     {
//         $this->$property = $value;
//     }

//     public function __get($property)
//     {
//         return $this->$property;
//     }
//     }
//     $me = new Classy( ) ;
//     $me->priv = 'Hello world';
//     echo $me->priv . "\n\n";
class First
{
    public function lol(string $lol)
    {
        echo $lol . "\n";
    }

    private function name(): void
    {
        echo "Im private";
    }

    public function displayName(): void
    {
        $this->name();
    }
}

class Second extends First
{
    public function lol(string $num)
    {
        parent::lol($num);
    }
}

$obj = new First();
$obj->displayName();