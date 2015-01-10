<?php
namespace app\EmpApp\Repositories\Department;

use app\EmpApp\Models\Department;
use app\EmpApp\Repositories\AbstractRepository;
use app\EmpApp\Services\Forms\Department\DepartmentCreateForm;
use app\EmpApp\Services\Forms\Employee\EmployeeCreateForm;

class DepartmentRepository extends AbstractRepository implements DepartmentInterface
{
    /**
     * Create an Instance Department Model
     *
     * @param Department $department
     */
    public function __construct(Department $department)
    {
        $this->model = $department;
    }

    /**
     * Get list Employee with search
     *
     * @param $s
     * @return array
     */
    public function find($s)
    {
        $department = $this->model->find()->andFilterWhere(['like', 'firs_name', $s]);

        return $this->getPaginate($department);
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
        $department = $this->model->findOne($id);
        if ($department === null) {
            throw new \HttpException(404, "Record does not exist!");
        }

        return $department;
    }

    /**
     * Store a new Employee
     *
     * @param array $data
     * @return string
     */
    public function create(array $data)
    {
        $department = $this->getNew();

        $department->first_name = $this->e($data['first_name']);
        $department->last_name = $this->e($data['last_name']);
        $department->bird_date = $this->e($data['bird_date']);
        $department->gender = $this->e($data['gender']);
        $department->hire_date = $this->e($data['hire_date']);
        $department->save();

        return $department;
    }

    /**
     * Update a Employee
     *
     * @param Department $department
     * @param array      $data
     * @return Department
     * @throws \Exception
     */
    public function update(Department $department, array $data)
    {
        $department->first_name = $this->e($data['first_name']);
        $department->last_name = $this->e($data['last_name']);
        $department->bird_date = $this->e($data['bird_date']);
        $department->gender = $this->e($data['gender']);
        $department->hire_date = $this->e($data['hire_date']);
        $department->update();

        return $department;
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
        $department = $this->findById($id);

        if ($department === null) {
            throw new \HttpException(404, "Record does not exist or has been deleted!");
        }

        $department->delete();

        return 'The Record is successfully deleted';
    }

    /**
     * Get the input form from Employee
     *
     * @return EmployeeCreateForm
     */
    public function getCreationForm()
    {
        return new DepartmentCreateForm($this->model);
    }
}