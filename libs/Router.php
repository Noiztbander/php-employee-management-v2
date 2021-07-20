<?php

class Router {

    function __construct() {
        echo '<p>Router loaded</p>';

        // Get the URL as position [0] controller and position [1] for methods
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        var_dump($url);
    }
}