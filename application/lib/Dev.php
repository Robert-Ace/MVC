<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if(!defined('debug')) {
    function debug($variable)
    {
        echo '<pre>';
        var_dump($variable);
        echo '</pre>';
        exit();
    }
}

if(!defined('dump')) {
    function dump($variable)
    {
        echo '<pre>';
        var_dump($variable);
        echo '</pre>';
    }
}

if(!defined('printArray')){
    function printArray(array $array, string $separator = ' : '): void
    {
        $result = null;
        foreach ($array as $key => $val) {
            if(is_array($val)) {
                foreach ($val as $key2 => $val2) {
                    $result .= $key2 . $separator . $val2 . "<br>";
                }
            } else {
                $result .= $key . $separator . $val . "<br>";

            }
        }
        echo $result;
    }
}