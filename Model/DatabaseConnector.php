<?php

class DatabaseConnector
{
    /**
     * @var PDO database connection object
     */
    private $_mysql;

    /**
     * @var Array query result
     */
    private $_result;

    /**
     * Create new database connector controller instance.
     */
    public function __construct()
    {
         $this->connect(constants::DB_HOST, constants::DB_USERNAME, constants::DB_PASSWORD, constants::DB_NAME);
    }

    /**
     * Connect to mysqli database with given configuration.
     *
     * @param string $servername
     * @param string $username
     * @param string $password
     * @param string $dbname
     */
    public function connect($servername = 'localhost', $username = 'root', $password = 'TYKQOigJZ2', $dbname = 'Reports')
    {
        try {
            $this->_mysql = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);

            // This line is for PDO debug mode
            $this->_mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e)
        {
            die("Error!: " . $e->getMessage() . "<br/>");
        }
    }

    /**
     * Execute update queries.
     *
     * @param $query
     * @param array $params
     *
     * @return bool
     */
    public function update($query, $params = array())
    {
        $sql_stmt = $this->_mysql->prepare($query);

        foreach($params as $i => $param) {
            $sql_stmt->bindValue(++$i, $param['value'], $param['type']);
        }

        return $sql_stmt->execute();
    }

    /**
     * Execute delete queries.
     *
     * @param $query
     * @param array $params
     *
     * @return bool
     */
    public function delete($query, $params = array())
    {
        $sql_stmt = $this->_mysql->prepare($query);

        foreach($params as $i => $param) {
            $sql_stmt->bindValue(++$i, $param['value'], $param['type']);
        }

        return $sql_stmt->execute();
    }

    /**
     * Execute select queries.
     *
     * @param $query
     * @param array $params
     * @internal param $params
     *
     * @return DatabaseConnector | bool
     */
    public function select($query, $params = array())
    {
        $sql_stmt = $this->_mysql->prepare($query);

        foreach($params as $i => $param) {
            $sql_stmt->bindValue(++$i, $param['value'], $param['type']);
        }

        $sql_stmt->execute();
        
        $this->_result = $sql_stmt->fetchAll();

        return $this;
    }

    /**
     * Get first row of result array.
     *
     * @return array
     */
    public function getFirst()
    {
        foreach ($this->_result as $row) {
            return $row;
        }
    }

    /**
     * Get all result rows as an array.
     *
     * @return array
     */
    public function getAll()
    {
        $res = array();

        if(empty($this->_result)) {
            return json_encode(array());
        }

        foreach ($this->_result as $row) {
            $row = ModelHelper::removeNumericKeys($row);
            $res[] = $row;
        }

        return json_encode($res);
    }
}