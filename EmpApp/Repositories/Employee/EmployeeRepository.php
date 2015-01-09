<?php
namespace app\EmpApp\Repositories\Employee;

use app\EmpApp\Models\Employee;
use app\EmpApp\Repositories\AbstractRepository;
use app\SchoolApp\Services\Forms\Employee\EmployeeCreateForm;

class EmployeeRepository extends AbstractRepository implements EmployeeInterface
{
    /**
     * Create an Instance Employee Model
     *
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->model = $employee;
    }

    /**
     * Get list Employee with search
     *
     * @param $s
     * @return array
     */
    public function find($s)
    {
        $employee = $this->model->find()->andFilterWhere(['like', 'firs_name', $s]);

        return $this->getPaginate($employee);
    }

    /**
     * Get a Employee
     *
     * @param $id
     * @return static
     * @throws \HttpException
     */
    public function findById($id)
    {
        $employee = $this->model->findOne($id);
        if ($employee === null) {
            throw new \HttpException(404, "Record does not exist!");
        }

        return $employee;
    }

    /**
     * Store a new Employee
     *
     * @param array $data
     * @return string
     */
    public function create(array $data)
    {
        $employee = $this->getNew();

        $employee->first_name = $this->e($data['first_name']);
        $employee->last_name = $this->e($data['last_name']);
        $employee->bird_date = $this->e($data['bird_date']);
        $employee->gender = $this->e($data['gender']);
        $employee->hire_date = $this->e($data['hire_date']);
        $employee->save();

        return $employee;
    }

    /**
     * Update a Employee
     *
     * @param Employee $employee
     * @param array    $data
     * @return Employee
     * @throws \Exception
     */
    public function update(Employee $employee, array $data)
    {
        $employee->first_name = $this->e($data['first_name']);
        $employee->last_name = $this->e($data['last_name']);
        $employee->bird_date = $this->e($data['bird_date']);
        $employee->gender = $this->e($data['gender']);
        $employee->hire_date = $this->e($data['hire_date']);
        $employee->update();

        return $employee;
    }

    /**
     * Delete a Employee
     *
     * @param $id
     * @return string
     * @throws \HttpException
     */
    public function destroy($id)
    {
        $employee = $this->findById($id);

        if ($employee === null) {
            throw new \HttpException(404, "Record does not exist or has been deleted!");
        }

        $employee->delete();

        return 'The Record is successfully deleted';
    }

    /**
     * Get the input form from Employee
     *
     * @return EmployeeCreateForm
     */
    public function getCreationForm()
    {
        return new EmployeeCreateForm($this->model);
    }
}