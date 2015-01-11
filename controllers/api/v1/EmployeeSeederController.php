<?php namespace app\controllers\api\v1;

use Faker\Factory;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class EmployeeSeederController extends Controller
{
    /**
     * Set allowed request method
     *
     * @return array
     */
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

    /**
     * View index
     */
    public function actionIndex()
    {
        $request = Yii::$app->getRequest();

        echo \Yii::$app->view->renderFile('@app/views/student.twig', ['csrf' => $request->getCsrfToken()]);
    }

    /**
     * Generate sample data using Faker, it's Awesome high quality data generator
     * Special thank's to  حافظ مخلصين for that already gives sample code
     * https://www.facebook.com/hafidm
     *
     * @param int $row
     * @param int $iterate
     * @throws \yii\db\Exception
     */
    public function actionGenerate($row = 10, $iterate = 1)
    {
        $start = microtime(true);
        $faker = Factory::create();
        $employees = [];
        for ($j = 1; $j <= $iterate; $j++) {
            for ($i = 1; $i <= $row; $i++) {
                $employees[$i] = [
                    $faker->name,
                    rand(0, 1),
                    $faker->dateTimeThisCentury->format('Y-m-d'),
                    $faker->email,
                    $faker->phoneNumber,
                    $faker->streetAddress
                ];
            }
            \Yii::$app->db->createCommand()->batchInsert('employee',
                ['name', 'gender', 'born', 'email', 'phone', 'address'], $employees)->execute();
        }
        $time_elapsed_us = microtime(true) - $start;
        echo ($row * $iterate) . ' = ' . $time_elapsed_us . ' <br>';
    }
}
