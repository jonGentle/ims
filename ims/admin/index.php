<?php
// core configuration
include_once "../config/core.php";

// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
include_once '../objects/department.php';

// check if logged in as admin
include_once "login_checker.php";

// get database connection
$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$department = new Department($db);

// set page title
$page_title = "Current Users";

// include page header HTML
include_once "layout_head.php";

// query users
$stmt = $user->readAll($from_record_num, $records_per_page);

// count retrieved users
$num = $stmt->rowCount();

// specify the page where paging is used
$page_url = "index.php?";

// count total rows - used for pagination
$total_rows = $user->countAll();

// read_users_template.php controls how the user list will be rendered
include_once "read_users_template.php";

// include page footer HTML
include_once "layout_foot.php";
?>
