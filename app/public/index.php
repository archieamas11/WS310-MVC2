<?php

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
        $content = '../views/form.php';
        $record  = 'active';
        break;

    case 'logout':
        $title    = "Logout";
        $content  = 'logout.php';
        $activity = 'active';

    default:
        $title     = "Dashboard";
        $content   = '../views/dashboard.php';
        $dashboard = 'active';
}

include "../views/template/template.php";

?>
