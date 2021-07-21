<?php

class View
{
    function __construct()
    {
        echo "<p>Base view class</p>";
    }

    function render($name)
    {
        require VIEWS . '/' . $name . '.php';
    }
}

?>