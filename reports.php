<?php

if(!$_POST['isAjax']) {
    require_once('../hmenu.php');
}

require_once('./.env.php');
require_once('./Model/TemplateModel.php');
require_once('./Model/LayoutModel.php');
require_once('./Controller/ReportController.php');

$controller = new ReportController();

if (isset($_POST['action']) && !empty($_POST['action']))
{
    switch($_POST['action']) {
        case 'newTemplateWizard':
            echo $controller->create();
            break;
        case 'removeReportTemplate':
            echo $controller->removeReportTemplate($_POST['templateId']);
            break;
        case 'loadAllLayouts':
            echo $controller->loadAllLayouts();
            break;
        case 'loadReportSubTypes':
            echo $controller->loadSubTypes($_POST['typeId']);
            break;
        case 'loadReportSubTypesCharts':
            echo $controller->loadSubTypeCharts($_POST['subTypeId']);
            break;
        case 'storeTemplate':
            echo $controller->storeTemplate($_POST['form'], $_POST['layout']);
            break;
        default:
            die(); //TODO return error for ajax
    }
}
else
{
    echo $controller->index();
}