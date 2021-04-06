<?php

class IndexController extends Controller
{
    function index(){
        printLine('===> IndexController');
        printLine('===> test1');
    }

    function test($name = 'name1', $age = 10){
        printLine("===> test2-name:{$name}-age:{$age}");
    }

    // 首页方法，测试框架自定义DB查询
    public function item()
    {
        $items = (new ItemModel)->selectAll();
        var_dump($items);

        $this->assign('title', '全部条目');
        $this->assign('items', $items);
    }
}