<?php

require_once('Controller.php');
require_once('ControllerHelper.php');

class StudentController extends Controller
{
    /**
     * Create new student controller instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show first page of student list.
     *
     * @return string
     */
    public function index()
    {
        // get student list from model
        $studentModel = new StudentModel();

        $students = json_decode($studentModel->getAllStudentss());

        // load corresponding view and pass students array to it
        return $this->loadView( 'student.index', array('students' => $students) );
    }

    /**
     * Show create page of student.
     */
    public function create()
    {
        $studentModel = new StudentModel();

        return $this->loadView( 'student.create' );
    }

    /**
     * Handle remove student command.
     *
     * @param $studentId
     * @return string bool
     */
    public function removeStudent($studentId)
    {
        $studentModel = new StudentModel();

        return json_encode($studentModel->removeStudent($studentId));
    }

    /**
     * Handle store student command.
     *
     * @param $studentInfo
     * @return int student id
     */
    public function storeStudent($studentInfo)
    {
        $studentModel = new StudentModel();

        return json_encode($studentModel->storeStudent($studentInfo['name']));
    }

}