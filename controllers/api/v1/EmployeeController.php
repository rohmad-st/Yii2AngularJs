<?php
namespace app\controllers\api\v1;

use app\EmpApp\Repositories\Employee\EmployeeInterface;
use yii\filters\VerbFilter;
use yii\web\Controller;

class EmployeeController extends Controller
{
    /**
     * Employee Repository Interface
     *
     * @var EmployeeInterface $employee
     */
    protected $employee;

    /**
     * Create a new EmployeeController instance
     *
     * @param string            $id
     * @param \yii\base\Module  $module
     * @param EmployeeInterface $employee
     * @param array             $config
     */
    public function __construct($id, $module, EmployeeInterface $employee, $config = [])
    {
        $this->employee = $employee;
        // todo remove it
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
     * Get List of Employees
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $term = $this->employee->getCreationForm()->inputSearch();

        return $this->employee->find($term);
    }

    /**
     * Store a new Employee
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $form = $this->employee->getCreationForm();
        $data = $form->inputData();

        if (is_null($form->isValid())) {
            return $this->employee->create($data);
        } else {
            return $form->isErrors();
        }
    }

    /**
     * Update a Employee record
     *
     * @param $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $form = $this->employee->getCreationForm();
        $employee = $this->employee->findById($id);
        $data = $form->inputData();

        if (is_null($form->isValid())) {
            return $this->employee->update($employee, $data);
        } else {
            return $form->isErrors();
        }
    }

    /**
     * Show a Employee
     *
     * @param $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->employee->findById($id);
    }

    /**
     * Destroy a Employee
     *
     * @param $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        return $this->employee->destroy($id);
    }
}