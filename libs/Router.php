<?php
require_once(CONTROLLERS . '/LoginController.php');

class Router
{

    function __construct()
    {
        session_start();

        echo '<p>Router loaded</p>';

        // Get the URL as position [0] controller and position [1] for methods
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        // Check if session exists
        if (isset($_SESSION["loggedUsername"])) {
        } else {
            $login = new LoginController();
            $login->render();
        }
    }
}

?>