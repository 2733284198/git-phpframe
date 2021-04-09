<?php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;


class TestController
{
    function index(){
        printLine(__CLASS__);
        printLine(__METHOD__);
    }

    function t1(){
        $paths = array("/path/to/entity-files");
        $isDevMode = false;

// the connection configuration
        $dbParams = array(
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => 'a123456',
            'host' => 'localhost',
            'dbname' => 'todo6',
        );

//
        $config = new \Doctrine\DBAL\Configuration();
        $conn = \Doctrine\DBAL\DriverManager::getConnection($dbParams, $config);

        echo "<h1>fetchAll（获取全部）, fetchAssoc（获取行）, fetchColumn（获取单个）示例</h1>";
        $users = $conn->fetchAll('SELECT * FROM alarm_sound_library ');
        var_dump($users);

        exit('11');

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $entityManager = EntityManager::create($dbParams, $config);

//        var_dump($config);
//        var_dump($entityManager);

        $rsm = new ResultSetMapping();
// build rsm here

//        $query = $entityManager->createNativeQuery('SELECT * FROM alarm_sound_library = ?', $rsm);
        $query = $entityManager->createNativeQuery('SELECT * FROM alarm_sound_library');
//        $query->setParameter(1, 'romanb');

        $users = $query->getResult();
        var_dump($users);
    }

    function t2() {

    }
}