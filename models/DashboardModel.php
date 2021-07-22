<?php

class DashboardModel extends Model
{
    public function __construct()
    {
        //This calls to the constructor of the class Model is extending
        parent::__construct();

        // if (EXECUTION_FLOW)
            echo '<p>Dashboard model loaded</p>';
    }

}

?>