<?php

class DashboardController extends Controller
{

    function __construct()
    {
        parent::__construct();
        echo "<p>Dashboard Class loaded</p>";
    }

    function defaultMethod()
    {
        $this->defaultFunction();
    }

    function defaultFunction() {
        echo "hola, estamos bien?";
        $this->view->render('dashboard/index');
    }

    public function holamundo() {
        echo "hola mundo desde el dashboard";
        $this->view->render('dashboard/index');
    }

    public function holamundoconparametros($params) {
        print_r("Toma tus parametros perro: " . $params);
    }

    function render(){
        $this->view->render('dashboard/index');
    }
}