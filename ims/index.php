<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title="Index";
 
// include login checker
$require_login=true;
include_once "login_checker.php";
 
echo "
<div class='col-md-12'>";
 
    // to prevent undefined index notice
    $action = isset($_GET['action']) ? $_GET['action'] : "";
 
    // if login was successful
    if($action=='login_success'){
        echo "
	<div class='alert alert-info'>";
            echo "
		<strong>Hi " . $_SESSION['firstname'] . "</strong>";
        echo "
	</div>";
    }
 
    // notify the user if they are already logged in
    else if($action=='already_logged_in'){
        echo "
	<div class='alert alert-info'>";
            echo "
		<strong>You are already logged in.</strong>";
        echo "
	</div>";
    }
  

