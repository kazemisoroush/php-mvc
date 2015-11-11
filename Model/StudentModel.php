<?php

require_once('Model.php');
require_once('ModelHelper.php');

class StudentModel extends Model
{
    /**
     * Create new student model instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Fetch all students.
     *
     * @return Array of all students
     */
    public function getAllStudents()
    {
        $query = '
            select c.id, c.name
            from students as c
            where 1';

        return $this->select($query)->getAll();
    }

    /**
     * Remove student by id.
     *
     * @param $studentId
     * @return bool
     */
    public function removeStudent($studentId)
    {
        $query = 'delete from students where id = ?';

        return $this->delete($query, array(
            array('value' => $studentId, 'type' => PDO::PARAM_INT)
        ));
    }

    /**
     * Update a student student by given parameters.
     *
     * @param $id
     * @param $name
     * @return bool
     */
    public function updateStudent($id, $name)
    {
        $query = '
            update students as c
            set c.Name = ?
            where c.id = ?';

        return $this->update($query, array(
            array('value' => $id, 'type' => PDO::PARAM_INT),
            array('value' => $name, 'type' => PDO::PARAM_STR),
        ));
    }

    /**
     * Create new student by given parameters.
     *
     * @param $id
     * @param $name
     * @return bool
     */
    public function storeStudent($studentName)
    {
        $query = '
            insert into students
            (id, name)
            values
            (default, ?)';

        return $this->insert($query, array(
            array('value' => $studentName, 'type' => PDO::PARAM_STR),
        ));
    }
}