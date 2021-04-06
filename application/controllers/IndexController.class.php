<?php

class IndexController
{
    function index(){
        printLine('===> IndexController');

        printLine(__CLASS__);
        printLine(__METHOD__);

        printLine('===> test1');
    }

    function test($name = 'name1'){
        printLine("===> test2-{$name}");
    }
}