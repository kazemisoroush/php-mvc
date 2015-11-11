<?php

require_once('Model.php');
require_once('ModelHelper.php');

class UniversityModel extends Model
{
    /**
     * Create new university model instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Fetch all universities.
     *
     * @return Array of all universities
     */
    public function getAllUniversitys()
    {
        $query = '
            select c.id, c.name
            from universities as c
            where 1';

        return $this->select($query)->getAll();
    }

    /**
     * Remove university by id.
     *
     * @param $universityId
     * @return bool
     */
    public function removeUniversity($universityId)
    {
        $query = 'delete from universities where id = ?';

        return $this->delete($query, array(
            array('value' => $universityId, 'type' => PDO::PARAM_INT)
        ));
    }

    /**
     * Update a university university by given parameters.
     *
     * @param $id
     * @param $name
     * @return bool
     */
    public function updateUniversity($id, $name)
    {
        $query = '
            update universities as c
            set c.Name = ?
            where c.id = ?';

        return $this->update($query, array(
            array('value' => $id, 'type' => PDO::PARAM_INT),
            array('value' => $name, 'type' => PDO::PARAM_STR),
        ));
    }

    /**
     * Create new university by given parameters.
     *
     * @param $id
     * @param $name
     * @return bool
     */
    public function storeUniversity($universityName)
    {
        $query = '
            insert into universities
            (id, name)
            values
            (default, ?)';

        return $this->insert($query, array(
            array('value' => $universityName, 'type' => PDO::PARAM_STR),
        ));
    }
}