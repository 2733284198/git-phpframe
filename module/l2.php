<?php

echo '<br><hr>Current PHP version: ' . phpversion(). '<br><hr>';

//function __autoload($className){
//    $filePath ="./$className.php";
//    if (file_exists($filePath)){
//        require_once "./$filePath";
//    }
//}

// 自动加载1
/*spl_autoload_register(function($className){
   $filePath = "./$className.php";
   if (file_exists($filePath)){
       require_once "./$filePath";
   }
});*/

// 自动加载2 1
$myClass = function ($className){
    $filePath = "./$className.php";
    if (file_exists($filePath)){
        require_once "./$filePath";
    }
};

spl_autoload_register($myClass);

// 加载工具类
require_once "tools.php";
printLine();

//require_once "./c1.php";
$user1 = new User();
echo $user1->getInfo();

//echo '<br><hr>';
printLine();
$user1 = new Student();
echo $user1->getInfo();

//echo '<br><hr>';
printLine();
$user1 = new Teacher();
echo $user1->getInfo();

//echo '<br><hr>';
printLine();