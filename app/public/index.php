<?php
session_start();
require_once "../models/Model.php";
require_once "../views/tabs/delete_record.php";
require_once "../views/tabs/update_record.php";
require_once "../views/tabs/retrieve_record.php";

$model = new Model();

$content = '../views/dashboard.php';

$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';

switch ($view) {
    case 'dashboard':
        $title     = "Dashboard";
        $content   = '../views/dashboard.php';
        $dashboard = 'active';
        break;

    case 'insert':
        $title   = "New Record";
        $content = '../views/tabs/insert_record.php';
        $record  = 'active';
        break;

    case 'logout':
        $title    = "Logout";
        $content  = 'logout.php';
        $activity = 'active';
        break;

    case 'record':
        $title    = "Records";
        $content  = '../views/tabs/insert_record.php';
        $record   = 'active';
        break;

    default:
        $title     = "Dashboard";
        $content   = '../views/dashboard.php';
        $dashboard = 'active';
}

include "../views/template/template.php";

?>
