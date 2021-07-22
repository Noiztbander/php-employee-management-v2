<?php

class LoginController extends Controller
{
    function __construct()
    {
        parent::__construct();
        echo "<p>Login controller class Loaded</p>";
    }

    function defaultMethod()
    {
        $this->defaultFunction();
    }

    function defaultFunction() {
        echo "hola, estamos bien?";
        $this->view->render('login/index');
    }

    function holamundo() {
        echo "hola mundo desde el LOGIN";
        $this->view->render('dashboard/index');
    }

    // function getUserAndPasswordFromDB() {
    //     echo "hola, estamos bien?";

    //     $userJson = file_get_contents("../../resources/users.json");
    //     $users = json_decode($userJson, true);
    //     $loggedUserName = $users["users"][0]["name"];
    //     $loggedUserPassword = $users["users"][0]["password"];
    //     $recivedUserName = $_POST["user"];
    //     $recivedUserPassword = $_POST["password"];

    //     $login = validateLoginData(
    //     $recivedUserName,
    //     $recivedUserPassword,
    //     $loggedUserName,
    //     $loggedUserPassword
    //     );
    // }

    // function validateLoginData($launchUser, $launchPassword, $logedUser, $logedPassword)
    // {
    //     switch (true) {
    //         case ($launchUser == $logedUser && password_verify($launchPassword, $logedPassword)):
    //             return "Logged";
    //             break;
    //         case (($launchUser != $logedUser) && !password_verify($launchPassword, $logedPassword)):
    //             return "Wrong name and password";
    //             break;
    //         case (!($launchUser == $logedUser)):
    //             return "Wrong name";
    //             break;
    //         case (!password_verify($launchPassword, $logedPassword)):
    //             return "Wrong password";
    //             break;
    //         default:
    //             break;
    //     }
    // }


    // function startSession()
    // {
    //     $_SESSION["login_time"] = time();
    //     header("Location:../dashboard.php");
    // }

    // function destroySession()
    // {
    //     session_unset();
    //     setcookie(session_name(), "", time() - 3600);
    //     session_destroy();
    //     session_start();
    //     $_SESSION['logout'] = " You've been logged out";
    //     header("Location:../../index.php");
    // }

    function render()
    {
        $this->view->render('login/index');
    }

}

?>

