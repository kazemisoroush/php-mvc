<?php

require_once('Controller.php');
require_once('ControllerHelper.php');

class CourseController extends Controller
{

    /**
     * Create new course controller instance.
     */
	public function __construct()
	{
        parent::__construct();
	}

    /**
     * Show first page of courses.
     *
     * @return string
     */
    public function index()
    {
        // get course list from model
        $courseModel = new CourseModel();

        $courses = $courseModel->getAllCourses();

        // load corresponding view and pass course array to it
        return $this->loadView( 'course.index', array('courses' => $courses) );
    }

    /**
     * Show create page of course.
     */
    public function create()
    {
        $courseModel = new CourseModel();

        return $this->loadView( 'course.create' );
    }

    /**
     * Handle remove course command.
     *
     * @param $courseId
     * @return string bool
     */
    public function removeCourse($courseId)
    {
        $courseModel = new CourseModel();

        return json_encode($courseModel->removeCourse($courseId));
    }

    /**
     * Handle store course command.
     *
     * @param $courseInfo
     * @return int course id
     */
    public function storeCourse($courseInfo)
    {
        $courseModel = new CourseModel();

        return json_encode($courseModel->storeCourse($courseInfo['name']));
    }
}
