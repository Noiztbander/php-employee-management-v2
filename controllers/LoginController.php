<?php

class LoginController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function defaultMethod()
    {
        $this->handleActiveUser();
    }

    function handleActiveUser() {

        $this->view->render('login/index');
    }

    function getInputsFromForm() {
        $recivedUserName = $_POST["user"];
        $recivedUserPassword = $_POST["password"];
        // $recivedUserPassword = password_hash($recivedUserPassword, PASSWORD_DEFAULT);
        $contents = $this->model->getReceivedUserFromDb($recivedUserName, $recivedUserPassword);

        // var_dump($contents);

        if($contents == null ){
            $loggedUserName = "";
            $loggedUserPassword = "";
        } else {

            $loggedUserName = $contents[0]->name;

            foreach($contents as $users){
                $searchedPassword = password_verify($recivedUserPassword, $users->password);
                if($searchedPassword == 1){
                    $loggedUserPassword = $users->password;
                } else {
                    $loggedUserPassword = "";
                }
            }

        }

        $login = $this->validateLoginData(
            $recivedUserName,
            $recivedUserPassword,
            $loggedUserName,
            $loggedUserPassword
            );

        echo $login;

        $this->checkViewToexecute($login, $loggedUserName);

    }

    function validateLoginData($recivedUserName, $recivedUserPassword, $loggedUserName, $loggedUserPassword)
    {
        switch (true) {
            case ($recivedUserName == $loggedUserName && password_verify($recivedUserPassword, $loggedUserPassword)):
                return "Logged";
                break;
            case (($recivedUserName != $loggedUserName) && !password_verify($recivedUserPassword, $loggedUserPassword)):
                return "Wrong name and password";
                break;
            case (!($recivedUserName == $loggedUserName)):
                return "Wrong name";
                break;
            case (!password_verify($recivedUserPassword, $loggedUserPassword)):
                return "Wrong password";
                break;
            default:
                break;
        }
    }

    function checkViewToexecute ($login, $loggedUserName) {
        switch ($login) {
            case "Logged":
                $_SESSION["loggedUsername"] = $loggedUserName;
                // $this->view->render('dashboard/index');
                // header("Location:./sessionHelper.php?login=true");
                header("Location: ../dashboard/loadViewDashboard");
                break;
            case "Wrong name and password":
                $_SESSION["wrongEmailPass"] = "Wrong email and password";
                $this->view->render('login/index');
                // header("Location:../../index.php");
                break;
            case "Wrong name":
                $_SESSION["wrongName"] = "Wrong name";
                $this->view->render('login/index');
                // header("Location:../../index.php");
                break;
            case "Wrong password":
                $_SESSION["wrongPass"] = "Wrong password";
                $this->view->render('login/index');
                // header("Location:../../index.php");
                break;
            default:
                echo "Something went wrong";
                break;
        }
    }

    function render()
    {
        $this->view->render('login/index');
    }

}

?>

