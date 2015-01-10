<?php namespace app\EmpApp\Services\Forms\Employee;


use app\EmpApp\Models\Employee;
use app\EmpApp\Services\Forms\AbstractForm;

class EmployeeCreateForm extends AbstractForm
{
    /**
     * Create Instance Model
     *
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->model = $employee;
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