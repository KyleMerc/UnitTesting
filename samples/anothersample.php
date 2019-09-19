<?php
class fairytale {
    private static $handsome =
        array ("Prince Valliant", "Superman", "Flash Gordon");
    private static $ugly     = 
        array ("Michael Moore", "Condoleezza Rice", "Ronald McDonald");

    function __get ($prop)
    {
        if ($prop == 'frank') return new fairytale();

        if ($prop=='frog')
            return self::$handsome;
        if (preg_match ('/^frog\\[([0-9]*)\\]$/', $prop, $res))
            return self::$ugly[$res[1]];
    }

    public function ret($isTrue): void
    {
        if ($isTrue) {
            echo "its true\n";
            return;
        }
            
        
        echo "Its false\n";
    }
}

function kiss ($prince)
{
    echo "$prince appears in a puff of smoke...\n";
}

$pond = new fairytale();
// $frog1 = $pond->frog[1]; // <-- array subscript parsed before getter is called
// $frog2 = 'frog[0]';
// $frog2 = $pond->$frog2;  // <-- array subscript parsed inside getter

// kiss ($frog1);
// kiss ($frog2); // <--- surprise!
// $sample = $pond->frank;
// var_dump($sample == $pond);
// $pond->ret(true);

$arr = ['orange', 'banana', 'iced tea'];
var_dump(implode(' ',$arr));