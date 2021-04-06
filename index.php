<?php

// 加载工具类
require_once "tools.php";
printLine("index.php");

// 应用程序目录
define('APP_PATH', __DIR__.'/');

// 开启调试模式
define('APP_DEBUG', true);

// 网站根url
define('APP_URL', 'http://localhost/phpframe/');

// 加载框架
require_once './FastPHP.php';