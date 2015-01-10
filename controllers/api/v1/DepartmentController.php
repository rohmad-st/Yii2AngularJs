<?php
namespace app\controllers\api\v1;

use app\EmpApp\Repositories\Department\DepartmentInterface;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DepartmentController extends Controller
{
    /**
     * Department Repository Interface
     *
     * @var DepartmentInterface $department
     */
    protected $department;

    /**
     * Create a new EmployeeController instance
     *
     * @param string              $id
     * @param \yii\base\Module    $module
     * @param DepartmentInterface $department
     * @param array               $config
     */
    public function __construct($id, $module, DepartmentInterface $department, $config = [])
    {
        $this->department = $department;
        // todo remove it, just for test by using Postman RestClient
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
        $term = $this->department->getCreationForm()->inputSearch();

        return $this->department->find($term);
    }

    /**
     * Store a new Employee
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $form = $this->department->getCreationForm();
        $data = $form->inputData();

        if (is_null($form->isValid())) {
            return $this->department->create($data);
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
        $form = $this->department->getCreationForm();
        $department = $this->department->findById($id);
        $data = $form->inputData();

        if (is_null($form->isValid())) {
            return $this->department->update($department, $data);
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
        return $this->department->findById($id);
    }

    /**
     * Destroy a Employee
     *
     * @param $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        return $this->department->destroy($id);
    }
}