<?php

// 加载工具类
require_once "tools.php";
//printLine("t2.php");

// 应用程序目录
define('APP_PATH', __DIR__.'/');

// 开启调试模式
define('APP_DEBUG', true); // todo:单独的config文件
//define('APP_DEBUG', false);

// 网站根url
define('APP_URL', 'http://localhost/phpframe/');

// 加载框架
require_once './EasyPhp.php';