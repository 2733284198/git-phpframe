<?php

require_once 'tools.php';
printLine('tools.php');

printLine(__FILE__);
//printLine(__FUNCTION__);
//printLine(__METHOD__);


Class Core
{
    // 运行程序
    function run(){

    }

    // 自动加载控制器和模型类
    static function loadClass($class) {
        $frameworks = FRAME_PATH . $class . '.class.php';
        $controllers = APP_PATH . 'application/controllers/' . $class . '.class.php';
        $models = APP_PATH . 'application/models/' . $class . '.class.php';
        if (file_exists($frameworks)) {
            // 加载框架核心类
            include $frameworks;
        } elseif (file_exists($controllers)) {
            // 加载应用控制器类
            include $controllers;
        } elseif (file_exists($models)) {
            //加载应用模型类
            include $models;
        } else {
            /* 错误代码 */
        }
    }
}