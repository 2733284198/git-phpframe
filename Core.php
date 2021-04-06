<?php

Class Core
{
    // 运行程序
    function run(){
        printLine(__METHOD__);

        spl_autoload_register(array($this,'loadClass'));
        $this->Route();
    }

    // 路由处理
    function Route() {
        $controllerName = 'Index';
        $action = 'index';

        if (!empty($_GET['url'])){
            $url = $_GET['url'];
            printLine($url);

            $urlArray = explode('/', $url);

            // 获取控制器名
            $controllerName = ucfirst($urlArray[0]);

            // 获取动作名
            array_shift($urlArray); // 移除开头元素
            $action = empty($urlArray[0]) ? 'index' :$urlArray[0];

            // 获取url参数
            array_shift($urlArray);
            $queryString = empty($urlArray) ? array() :$urlArray;
        }else{
            printLine('url为空');
        }

        // 数据为空的处理
        $queryString = empty($queryString) ? array(): $queryString;
        $controller = $controllerName. 'Controller';
        $dispatch = new $controller($controllerName, $action);

        // 如果控制器和动作存在,调用并传入url参数
        if ((int)method_exists($controller, $action)){
            call_user_func_array(array($dispatch, $action), $queryString);
        }else{
            exit($controller."控制器不存在");
        }
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