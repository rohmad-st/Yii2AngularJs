<?php
namespace app\EmpApp\Repositories\Employee;

use app\EmpApp\Models\Employee;

interface EmployeeInterface
{
    /**
     * Get list Employee with search
     *
     * @param $s
     * @return mixed
     */
    public function find($s);

    /**
     * Get a Employee
     *
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Store a new Employee
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update a Employee
     *
     * @param Employee $employee
     * @param          $data  array []
     * @return mixed
     */
    public function update(Employee $employee, array $data);

    /**
     * Delete a Employee
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * Get the input form from Employee
     *
     * @return mixed
     */
    public function getCreationForm();
}