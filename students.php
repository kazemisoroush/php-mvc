<?php

if(!$_POST['isAjax']) {
}

require_once('./.env.php');
require_once('./Model/StudentModel.php');
require_once('./Controller/StudentController.php');

$controller = new StudentController();

if (isset($_POST['action']) && !empty($_POST['action']))
{
    switch($_POST['action']) {
        case 'newStudent':
            echo $controller->create();
            break;
        case 'removeStudent':
            echo $controller->removeStudent($_POST['studentId']);
            break;
        case 'storeStudent':
            echo $controller->storeStudent($_POST['form']);
            break;
        default:
            die(); //TODO return error for ajax
    }
}
else
{
    echo $controller->index();
}