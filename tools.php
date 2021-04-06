<?php

if (!function_exists(printLine)){
    function printLine($title = 'debug'){
        if (strcmp($title, 'debug')){
            echo "<br><hr>--{$title}--<br><hr>";
        }else{
            echo "<br><hr>--debug--<br><hr>";
        }
    }
}