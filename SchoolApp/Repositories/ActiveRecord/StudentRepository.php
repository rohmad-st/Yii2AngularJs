<?php namespace app\SchoolApp\Repositories\ActiveRecord;


use app\SchoolApp\Repositories\StudentInterface;
use app\SchoolApp\Services\Forms\StudentCreateForm;
use app\SchoolApp\Students;
use yii\web\HttpException;

class StudentRepository extends AbstractRepository implements StudentInterface
{
    /**
     * Create a new Students Repository instance
     *
     * @param Students $students
     */
    public function __construct(Students $students)
    {
        $this->model = $students;
        $this->setJson();
    }

    /**
     * Get list of Students
     *
     * @param     $s
     * @return array|\yii\db\ActiveRecord[]
     */
    public function find($term)
    {
        $query = $this->model->find()->andFilterWhere(['like', 'name', $term]);

        return $this->getPaginate($query);
    }

    /**
     * Get a Student
     *
     * @param $id
     * @return static
     * @throws HttpException
     */
    public function findById($id)
    {
        $student = $this->model->findOne($id);

        if ($student === null) {
            throw new HttpException(404, "Record does not exist or has been deleted!");
        }

        return $student;
    }

    /**
     * Store a new Student
     *
     * @param array $data
     * @return string
     */
    public function create(array $data)
    {
        $student = $this->getNew();

        $student->nama = $this->e($data['nama']);
        $student->jenis_kelamin = $this->e($data['jenis_kelamin']);
        $student->alamat = $this->e($data['alamat']);
        $student->nomer_telepon = $this->e($data['nomer_telepon']);
        $student->save();

        return $student;
    }

    /**
     * Update a Student
     *
     * @param Students $student
     * @param array    $data
     * @return Students
     * @throws \Exception
     */
    public function update(Students $student, array $data)
    {
        $student->nama = $this->e($data['nama']);
        $student->jenis_kelamin = $this->e($data['jenis_kelamin']);
        $student->alamat = $this->e($data['alamat']);
        $student->nomer_telepon = $this->e($data['nomer_telepon']);
        $student->update();

        return $student;
    }

    /**
     * Destroy a Student
     *
     * @param $id
     * @return string
     * @throws HttpException
     */
    public function destroy($id)
    {
        $student = $this->findById($id);

        if ($student === null) {
            throw new HttpException(404, "Record does not exist or has been deleted!");
        }

        $student->delete();

        return 'The Record is successfully deleted';
    }

    /**
     * Get the Student form create
     *
     * @return StudentCreateForm
     */
    public function getCreationForm()
    {
        return new StudentCreateForm($this->model);
    }
}