<?php

class User{
    private $name='刘看山';
    private $age='4';
    private $male='female';

    /**
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function getInfo()
    {
        return "我是".$this->name.",我有".$this->age."岁";
    }

    /**
     * @return string
     */
    public static function getMale()
    {
//        return $this->male;
        return self::male;
    }
}

echo 'h1.php';

$user1 = new User();
echo $user1->getInfo();

