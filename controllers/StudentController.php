<?php namespace app\controllers;


use app\components\StudentInterface;
use yii\filters\VerbFilter;
use yii\web\Controller;

class StudentController extends Controller
{

    /**
     * Student Repository
     *
     * @var StudentInterface $student
     */
    protected $student;

    /**
     * Create a new StudentController instance
     *
     * @param string           $id
     * @param \yii\base\Module $module
     * @param StudentInterface $student
     * @param array            $config
     */
    public function __construct($id, $module, StudentInterface $student, $config = [])
    {
        $this->student = $student;
        \Yii::$app->getRequest()->enableCsrfValidation = false;
        parent::__construct($id, $module, $config);
    }

    /**
     * Set allowed request method
     *
     * @method behaviors
     * @return array
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'index'  => ['get'],
                    'create' => ['post'],
                    'update' => ['post'],
                    'view'   => ['get'],
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Get List of Students
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $s = $this->student->getCreationForm()->inputSearch();

        return $this->student->find($s);
    }

    /**
     * Store a new Student
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $form = $this->student->getCreationForm();
        $data = $form->inputData();

        if (is_null($form->isValid())) {
            return $this->student->create($data);
        } else {
            return $form->isErrors();
        }
    }

    /**
     * Update a Student record
     *
     * @param $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $form = $this->student->getCreationForm();
        $student = $this->student->findById($id);
        $data = $form->inputData();

        if (is_null($form->isValid())) {
            return $this->student->update($student, $data);
        } else {
            return $form->isErrors();
        }
    }

    /**
     * Show a Student
     *
     * @param $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->student->findById($id);
    }

    /**
     * Destroy a Student
     *
     * @param $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        return $this->student->destroy($id);
    }
}