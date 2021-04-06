<?php
/*
 * 控制器基类
 * */

class Controller
{
    protected $_controler;
    protected $_action;
    protected $_view;

    // 构造函数,初始化属性,并实例化对应模型
    function __construct($controler, $action)
    {
        $this->_controler = $controler;
        $this->_action = $action;

//        require_once 'view.class.php';
        $this->_view = new View($controler, $action);
    }

    // 分配变量

    /**
     * @return mixed
     */
    public function assign($name, $value)
    {
        $this->_view->assign($name, $value);
    }

    // 渲染视图
    function __destruct()
    {
        $this->_view->render();
    }

}