<?php
class test{
    public function __call($name, $arguments)
    {
        if ($name === 'test'){
            if(count($arguments) === 1 ){
                return $this->test1($arguments[0]);
            }
            if(count($arguments) === 2){
                return $this->test2($arguments[0], $arguments[1]);
            }
            if(count($arguments) === 3){
                return $this->test3($arguments[0], $arguments[1], $arguments[2]);
            }
        }
    }

    private function test1($data1)
    {
       echo $data1 . "\n";
    }

    private function test2($data1,$data2)
    {
       echo $data1.' '.$data2 . "\n\n";
    }

    private function test3($data1, $data2, $data3)
    {
        echo $data1 . ' ' . $data2 . ' ' . $data3 . "\n";
    }
}

$test = new test();
$test->test('one argument'); //echoes "one argument"
$test->test('three','arguments', 'niehg'); //echoes "two arguments"