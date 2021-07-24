<?php
// session_start();

	// Opening or closing the session
	if (isset($_GET["login"])) {
			if ($_GET["login"] == "true") {
					startSession();
			} else if ($_GET["login"] == "false") {
					destroySession();
			}
	}

	// Checking remaning time
	if (isset($_SESSION["login_time"])) {
			if (isset($_GET["timeoutCheck"])) {
					if (time() - $_SESSION["login_time"] >= 10 * 60) {
							echo "Log out";
					} else {
							$remainingTime =  time() - $_SESSION["login_time"];
							echo "$remainingTime is less than 10 minutes: ";
							echo "Not logging out.";
					}
			}
	}

class SessionHelperController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

	function startSession()
	{
			$_SESSION["login_time"] = time();
			header("Location:../dashboard.php");
	}

	function destroySession()
	{
			session_unset();
			setcookie(session_name(), "", time() - 3600);
			session_destroy();
			session_start();
			$_SESSION['logout'] = " You've been logged out";
			header("Location:../../index.php");
	}
}
?>