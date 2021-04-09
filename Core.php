<?php

Class Core
{
    // 运行程序
    function run(){
//        printLine(__METHOD__);

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
        // todo:参数为array
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

    // 检测开发环境
    function setReporting()
    {
        if (APP_DEBUG === true) {
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
            ini_set('log_errors', 'On');
            ini_set('error_log', RUNTIME_PATH. 'logs/error.log');
        }
    }

    // 删除敏感字符
    function stripSlashesDeep($value)
    {
        $value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
        return $value;
    }

    // 检测敏感字符并删除
    function removeMagicQuotes()
    {
        if ( get_magic_quotes_gpc()) {
            $_GET = stripSlashesDeep($_GET );
            $_POST = stripSlashesDeep($_POST );
            $_COOKIE = stripSlashesDeep($_COOKIE);
            $_SESSION = stripSlashesDeep($_SESSION);
        }
    }

    // 自动加载控制器和模型类
    static function loadClass($class) {
        $frameworks = FRAME_PATH . $class . '.class.php';
        $controllers = APP_PATH . 'application/controllers/' . $class . '.class.php';
        $models = APP_PATH . 'application/models/' . $class . '.class.php';
        $views = APP_PATH . 'application/views/' . $class . '.class.php';
        if (file_exists($frameworks)) {
            // 加载框架核心类
            include $frameworks;
        } elseif (file_exists($controllers)) {
            // 加载应用控制器类
            include $controllers;
        } elseif (file_exists($models)) {
            //加载应用模型类
            include $models;
        } elseif (file_exists($views)) {
            //加载应用模型类
            include $views;
        } else {
            /* 错误代码 */
        }
    }
}