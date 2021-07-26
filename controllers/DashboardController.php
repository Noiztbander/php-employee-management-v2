<?php

// include_once ENTITIES . '/Content.php';

class DashboardController extends Controller
{

    function __construct()
    {
        parent::__construct();
        // echo "<p>Dashboard Class loaded</p>";

        // session_start();
    }

    function defaultMethod()
    {
        $this->loadViewDashboard();
        // $this->getAllemployees();
    }

    function loadViewDashboard() {
        $this->view->render('dashboard/index');
    }

    public function getAllemployees() {

        // Calling a function depending on the requested method
        switch ($_SERVER["REQUEST_METHOD"]) {
            case "GET":
                if (isset($_GET["employeeRowId"])) {
                    getEmployee($_GET["employeeRowId"]);
                    break;
                } else {
                    $contents = $this->model->get();
                    header("Content-Type: application/json");
                    echo json_encode($contents);
                    break;
                }
            // case "PUT":
            //     parse_str(file_get_contents("php://input"), $_PUT);
            //     $updatedItem = $_PUT["updatedEmployee"];
            //     updateEmployee($updatedItem);
            //     break;
            // case "POST":
            //     addEmployee($_POST["newEmployee"]);
            //     break;
            // case "DELETE":
            //     parse_str(file_get_contents("php://input"), $_DELETE);
            //     deleteEmployee($_DELETE["deletedID"]);
            //     break;
            // default:
            //     echo "Not valid method";
            //     break;
        }
        // $this->view->render('dashboard/index');
    }

    public function holamundoconparametros($params) {
        var_dump($params);
        // print_r("Toma tus parametros perro: " . $params);
    }

    function render(){
        $this->view->render('dashboard/index');
    }
}