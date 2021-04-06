<?php

class Teacher {
    private $name = "刘看水";
    private $school  = "北京大学";

    public function getInfo(){
        return "我是{$this->name},我在{$this->school}任教";
    }
}
