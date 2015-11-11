<?php

require_once('Model.php');
require_once('ModelHelper.php');

class CourseModel extends Model
{
    /**
     * Create new course model instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Fetch all courses.
     *
     * @return Array of all courses
     */
    public function getAllCourses()
    {
        $query = '
            select c.id, c.name
            from courses as c
            where 1';

        return $this->select($query)->getAll();
    }

    /**
     * Remove course by id.
     *
     * @param $courseId
     * @return bool
     */
    public function removeCourse($courseId)
    {
        $query = 'delete from courses where id = ?';

        return $this->delete($query, array(
            array('value' => $courseId, 'type' => PDO::PARAM_INT)
        ));
    }

    /**
     * Update a course course by given parameters.
     *
     * @param $id
     * @param $name
     * @return bool
     */
    public function updateCourse($id, $name)
    {
        $query = '
            update courses as c
            set c.Name = ?
            where c.id = ?';

        return $this->update($query, array(
            array('value' => $id, 'type' => PDO::PARAM_INT),
            array('value' => $name, 'type' => PDO::PARAM_STR),
        ));
    }

    /**
     * Create new course by given parameters.
     *
     * @param $id
     * @param $name
     * @return bool
     */
    public function storeCourse($courseName)
    {
        $query = '
            insert into courses
            (id, name)
            values
            (default, ?)';

        return $this->insert($query, array(
            array('value' => $courseName, 'type' => PDO::PARAM_STR),
        ));
    }
}