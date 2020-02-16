<?php

class anagram {

    public function __construct($arg, $argcount)
    {
        if($argcount < 2)
        {
            echo 'Vous devez renseigner un mot :' . PHP_EOL;
            exit;
        }
    }

    public function anagram($s1, $nb = null)
    {

        $tableau = array();
        $handle = @fopen("anagram-master-dictionnaire.txt", "r" );

        if ($handle)
        {
           while (!feof($handle))
           {
             $buffer = fgets($handle, 4096);
             $tableau[] = trim($buffer);
           }
           fclose($handle);
        }

        foreach($tableau as $value)
        {
            if(count_chars($value, 1) === count_chars($s1, 1)
            && strlen($value) === strlen($s1))
            {
                echo $value . PHP_EOL;
            }
        }

    }
}

$anagram = new anagram($argv, $argc);
$anagram->anagram($argv[1]);

