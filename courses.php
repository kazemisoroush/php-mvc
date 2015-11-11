<?php

if(!$_POST['isAjax']) {
}

require_once('./.env.php');
require_once('./Model/CourseModel.php');
require_once('./Controller/CourseController.php');

$controller = new CourseController();

if (isset($_POST['action']) && !empty($_POST['action']))
{
    switch($_POST['action']) {
        case 'newCourse':
            echo $controller->create();
            break;
        case 'removeCourse':
            echo $controller->removeCourse($_POST['courseId']);
            break;
        case 'storeCourse':
            echo $controller->storeCourse($_POST['form']);
            break;
        default:
            die(); //TODO return error for ajax
    }
}
else
{
    echo $controller->index();
}