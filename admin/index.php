<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
session_start();
ob_start();
if (isset($_SESSION["idadmin"])) {
    include 'views/header.php';

    $controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';
    $controllerFile = 'controllers/' . ucfirst($controller) . 'Controller.php';
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controllerClassName = ucfirst($controller) . 'Controller';
        $controllerObj = new $controllerClassName();

        if (method_exists($controllerObj, $action)) {
            $controllerObj->$action();
        } else {
            echo 'Action not found';
        }
    } else {
        echo 'Controller not found';
    }

    include 'views/footer.php';
}
else{
    include "views/login.php";
}
?>