<?php namespace app\controllers;

use Faker\Factory;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'generate' => ['get'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $request = Yii::$app->getRequest();

        echo \Yii::$app->view->renderFile('@app/views/student.twig', ['csrf' => $request->getCsrfToken()]);
    }

    public function actionGenerate($row = 10, $iterate = 1)
    {
        $start = microtime(true);
        $faker = Factory::create();
        $datas = [];
        for ($j = 1; $j <= $iterate; $j++) {
            for ($i = 1; $i <= $row; $i++) {
                $datas[$i] = [
                    $faker->name,
                    rand(0, 1),
                    $faker->dateTimeThisCentury->format('Y-m-d'),
                    $faker->email,
                    $faker->phoneNumber,
                    $faker->streetAddress
                ];
            }
            \Yii::$app->db->createCommand()->batchInsert('employee',
                ['name', 'gender', 'born', 'email', 'phone', 'address'], $datas)->execute();
        }
        $time_elapsed_us = microtime(true) - $start;
        echo ($row * $iterate) . ' = ' . $time_elapsed_us . ' <br>';
    }
}
