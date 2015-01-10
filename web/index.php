<?php


// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

/*
* Register The Application Services
*/

// Register The Employee Service
\Yii::$container->set('app\EmpApp\Repositories\Employee\EmployeeInterface',
    'app\EmpApp\Repositories\Employee\EmployeeRepository');

// Register The Department Service
\Yii::$container->set('app\EmpApp\Repositories\Department\DepartmentInterface',
    'app\EmpApp\Repositories\Department\DepartmentRepository');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();