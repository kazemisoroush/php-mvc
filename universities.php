<?php

if(!$_POST['isAjax']) {
}

require_once('./.env.php');
require_once('./Model/UniversityModel.php');
require_once('./Controller/UniversityController.php');

$controller = new UniversityController();

if (isset($_POST['action']) && !empty($_POST['action']))
{
    switch($_POST['action']) {
        case 'newUniversity':
            echo $controller->create();
            break;
        case 'removeUniversity':
            echo $controller->removeUniversity($_POST['universityId']);
            break;
        case 'storeUniversity':
            echo $controller->storeUniversity($_POST['form']);
            break;
        default:
            die(); //TODO return error for ajax
    }
}
else
{
    echo $controller->index();
}