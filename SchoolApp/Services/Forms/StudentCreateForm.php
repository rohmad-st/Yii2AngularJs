<?php namespace app\SchoolApp\Services\Forms;


use app\SchoolApp\Students;

class StudentCreateForm extends AbstractForm
{
    /**
     * Create Instance Model
     *
     * @param Students $students
     */
    public function __construct(Students $students)
    {
        $this->model = $students;
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