<?php
 
// if access level is not 'Admin', redirect user to login page
if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Admin"){
    header("Location: {$home_url}admin/index.php?action=logged_in_as_admin");
}
 
// if $require_login was set and value is 'true'
else if(isset($require_login) && $require_login==true){
    // if the user is not yet logged in, redirect them to the login page
    if(!isset($_SESSION['access_level'])){
        header("Location: {$home_url}login.php?action=please_login");
    }
}
 
else if(isset($page_title) && ($page_title=="Login" || $page_title=="Sign Up")){
    // if user not yet logged in, redirect to login page
    if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="User"){
        header("Location: {$home_url}products/index.php?action=already_logged_in");
    }
}
 
else{
    // remain on current page
}
?>