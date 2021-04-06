<?php

class IndexController
{
    function index(){
        printLine('===> IndexController');
        printLine('===> test1');
    }

    function test($name = 'name1', $age = 10){
        printLine("===> test2-name:{$name}-age:{$age}");
    }
}