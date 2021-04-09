<?php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;


class TestController extends Controller
{
    function index(){
//        printLine(__CLASS__);
//        printLine(__METHOD__);
    }

    /*public function __callstatic(){
            echo(__METHOD__);
    }

    public function __call(){
            echo(__METHOD__);
    }*/

    function t1(){
        $paths = array("/path/to/entity-files");
        $isDevMode = false;

// the connection configuration
        // todo：数据库连接配置文件
        $dbParams = array(
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => 'a123456',
            'host' => 'localhost',
            'dbname' => 'todo6',
        );

        $config = new \Doctrine\DBAL\Configuration();
        $conn = \Doctrine\DBAL\DriverManager::getConnection($dbParams, $config);

        echo "<h1>fetchAll（获取全部）, fetchAssoc（获取行）, fetchColumn（获取单个）示例</h1>";
        $users = $conn->fetchAll('SELECT * FROM alarm_sound_library ');
        dump($users);

        $this->assign('title', '全部条目');
    }

    function t2() {
        echo '<hr>t2';
    }

    function t3() {
        $paths = array("/path/to/entity-files");
        $isDevMode = false;

        $dbParams = array(
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => 'a123456',
            'host' => 'localhost',
            'dbname' => 'todo6',
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $entityManager = EntityManager::create($dbParams, $config);


        $rsm = new ResultSetMapping();

//        $query = $entityManager->createNativeQuery('SELECT * FROM alarm_sound_library = ?', $rsm);
        $query = $entityManager->createNativeQuery('SELECT * FROM alarm_sound_library');
//        $query->setParameter(1, 'romanb');
        $users = $query->getResult();
        var_dump($users);
    }

    public function tstrh(){
        $str = new \StringhelperController("  sd f  0");
        echo $str->trim('0')->strlen();
    }

}