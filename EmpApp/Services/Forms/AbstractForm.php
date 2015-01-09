<?php namespace app\EmpApp\Services\Forms;

use yii\base\Model;

abstract class AbstractForm
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var array
     */
    protected $inputData = [];

    /**
     * Create a new form Instance
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        \Yii::$app->response->format = 'json';
    }

    /**
     * Get input data for store dan update
     *
     * @return array
     */
    public function getInputData()
    {
        return $this->inputData = \Yii::$app->request->getBodyParams();
    }

    /**
     * Validate data from user with attributes model
     *
     * @param Model $model
     * @return array|string
     * @throws \yii\base\InvalidConfigException
     */
    public function getValidate(Model $model)
    {
        $model->attributes = \Yii::$app->request->getBodyParams();
        if (!$this->model->validate()) {
            return $this->getErrors();
        }
    }

    /**
     * Get validation error message
     *
     * @return array
     */
    public function getErrors()
    {
        return $errors = $this->model->errors;
    }

    /**
     * Get input search
     * @todo using FullTextSearch
     *
     * @return mixed
     */
    public function getInputSearch()
    {
        $query = \Yii::$app->request->getQueryParams();

        return $query['term'];
    }
}