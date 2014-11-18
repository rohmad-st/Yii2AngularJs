<?php namespace app\SchoolApp\Repositories;


use app\SchoolApp\Students;

interface StudentInterface
{

    /**
     * Get list of Students
     *
     * @param     $s
     * @return mixed
     */
    public function find($term);

    /**
     * Get a Student
     *
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Store a new Student
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update a Student record
     *
     * @param Students $students
     * @param array    $data
     * @return mixed
     */
    public function update(Students $students, array $data);

    /**
     * Get input from user
     *
     * @return mixed
     */
    public function getCreationForm();

    /**
     * Destroy a Student record
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}