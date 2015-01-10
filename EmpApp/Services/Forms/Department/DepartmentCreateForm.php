<?php namespace app\EmpApp\Services\Forms\Department;


use app\EmpApp\Models\Department;
use app\EmpApp\Services\Forms\AbstractForm;

class DepartmentCreateForm extends AbstractForm
{
    /**
     * Create Instance Model
     *
     * @param Department $department
     */
    public function __construct(Department $department)
    {
        $this->model = $department;
    }

    /**
     * Get Input data for store and update
     *
     * @return array
     */
    public function inputData()
    {
        return $this->getInputData();
    }

    /**
     * Get Input search
     *
     * @return mixed
     */
    public function inputSearch()
    {
        return $this->getInputSearch();
    }

    /**
     * Validate user input
     *
     * @return array|string
     */
    public function isValid()
    {
        return $this->getValidate($this->model);
    }

    /**
     * Get Error Message
     *
     * @return array
     */
    public function isErrors()
    {
        return $this->getErrors();
    }
}