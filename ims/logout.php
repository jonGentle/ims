<?php
// core configuration
include_once "config/core.php";
 
// destroy session 
session_destroy();
  
//redirect to login page
header("Location: {$home_url}login.php");
?>