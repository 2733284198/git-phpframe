<?php

class Student {
    private $name = "刘看火";
    private $job  = "打妖怪";

    public function getInfo(){
        return "我是{$this->name},我的工作是{$this->job}";
    }
}
