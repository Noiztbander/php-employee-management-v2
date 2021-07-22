<?php

class View
{
    function __construct()
    {
        // echo "<p>Base view class loaded</p>";
    }

    function render($name)
    {
        require VIEWS . '/' . $name . '.php';
    }
}

?>