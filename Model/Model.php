<?php

require_once('DatabaseConnector.php');

class Model extends DatabaseConnector
{
    /**
     * Create new model instance.
     */
    public function __construct()
    {
        parent::__construct();
    }
}