<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Dumping function in cases of checking mistakes
    function dump($var, $exit = true, $dumpFunc = 'print_r')
    {
        if ( is_array($var) || is_object($var) )
        {
            echo '<pre>';
            $dumpFunc($var);
            echo '</pre>';
        }
        else {
            echo $var;
        }

        if ($exit)
        {
            exit;
        }
    }