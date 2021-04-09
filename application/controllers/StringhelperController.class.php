<?php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;


//class StringhelperController extends Controller
class StringhelperController
{
    private $value;

    function __construct($value)
    {
        $this->value = $value;
    }

    /*function __call($function, $args){
        $this->value = call_user_func($function, $this->value, $args[0]);
        return $this;
    }*/

    function strlen() {
//        $this->value = strlen($this->value);
//        return $this;
        return strlen($this->value);
    }

    public function trim($t)
    {
        $this->value = trim($this->value, $t);
        return $this;
    }
}

