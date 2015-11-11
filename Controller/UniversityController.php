<?php

require_once('Controller.php');
require_once('ControllerHelper.php');

class UniversityController extends Controller
{

    /**
     * Create new university controller instance.
     */
	public function __construct()
	{
        parent::__construct();
	}

    /**
     * Show first page of universitys.
     *
     * @return string
     */
    public function index()
    {
        // get university list from model
        $universityModel = new UniversityModel();

        $universitys = $universityModel->getAllUniversitys();

        // load corresponding view and pass university array to it
        return $this->loadView( 'university.index', array('universitys' => $universitys) );
    }

    /**
     * Show create page of university.
     */
    public function create()
    {
        $universityModel = new UniversityModel();

        return $this->loadView( 'university.create' );
    }

    /**
     * Handle remove university command.
     *
     * @param $universityId
     * @return string bool
     */
    public function removeUniversity($universityId)
    {
        $universityModel = new UniversityModel();

        return json_encode($universityModel->removeUniversity($universityId));
    }

    /**
     * Handle store university command.
     *
     * @param $universityInfo
     * @return int university id
     */
    public function storeUniversity($universityInfo)
    {
        $universityModel = new UniversityModel();

        return json_encode($universityModel->storeUniversity($universityInfo['name']));
    }
}
