<?php

// require_once(CONTROLLERS.'/DashboardController.php');

class EmployeeController extends Controller
{

    function __construct()
    {
        parent::__construct();
        // echo "<p>Dashboard Class loaded</p>";
    }

    function defaultMethod()
    {
        $this->loadViewEmployee();
    }

    function loadViewEmployee() {
        $this->view->render('employee/index');
    }

    function createNewEmployee () {
        $name = $_POST["newName"];
        $lastName = $_POST["newLastName"];
        $email = $_POST["newEmail"];
        $gender = $_POST["genderSelect"];
        $city = $_POST["newCity"];
        $streetAddress = $_POST["newStreetAdress"];
        $state = $_POST["newState"];
        $age = $_POST["newAge"];
        $postalCode = $_POST["newPostalCode"];
        $phoneNumber = $_POST["newPhone"];

        $data = ["name" => $name, "lastName" => $lastName, "email" =>$email, "gender"=>$gender, "city"=>$city, "streetAddress"=>$streetAddress, "state"=>$state, "age"=>$age, "postalCode"=>$postalCode, "phoneNumber"=>$phoneNumber];

        $response = $this->model->insertNewEmployee($data);

        if($response == "OK" ){
            header("Location: ../dashboard/");
        } else {
            echo "algo ha ido mal";
        }


    }

    function updateEmployee () {
        $id = $_GET["employeeRowId"];

        session_start();
        $foundUser = $this->model->getEmployeeById($id);
        $_SESSION["employeeToUpdate"] = $foundUser;
        // print_r($foundUser);
        echo "adioooos";
    }

    function render(){
        $this->view->render('employee/index');
    }
}