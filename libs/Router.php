<?php
require_once(CONTROLLERS . '/FailureController.php');
require_once(CONTROLLERS . '/LoginController.php');

class Router
{

    function __construct()
    {
        session_start();

        // echo '<p>Router loaded</p>';

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0])) {
            $fileController = CONTROLLERS . '/' . 'LoginController.php';
            require_once($fileController);
            $controller = new LoginController();
            $controller->loadModel('login');
            $controller->render();
            //$controller->defaultMethod();
            return false;
        }

        $class = ucfirst($url[0]);
        $fileController = CONTROLLERS . '/' . $class . 'Controller.php';
        $classController = $class . 'Controller';

        if (file_exists($fileController)) {

            require_once($fileController);

            $controller = new $classController;
            $controller->loadModel($class);

            $nParam = sizeof($url);

            if ($nParam == 1) {
                $controller->defaultMethod();
                // $controller->render();
            }
            if ($nParam == 2) {

                if ($controller->{$url[1]}() === false) {
                    $controller = new FailureController();
                }
                // $controller->render();

            } else if ($nParam > 2) {
                $params = [];
                for ($i = 2; $i < $nParam; $i++) {
                    array_push($params, $url[$i]);
                }
                if ($controller->{$url[1]}($params) === false) {
                    $controller = new FailureController();
                }
            }

        }else {
            $controller = new FailureController();
        }

        // Check if session exists
        // if (isset($_SESSION["loggedUsername"])) {
        // } else {
        //     $login = new LoginController();
        //     $login->render();
        // }
    }
}

?>