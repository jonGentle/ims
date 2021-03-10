<?php
// get ID of the user to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// include database and object files
include_once '../config/database.php';
include_once '../config/core.php';
include_once '../objects/user.php';
include_once '../objects/department.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// pass connection to objects
$user = new User($db);
$department = new Department($db);

// set ID property of user to be read
$user->id = $id;

// read the details of user to be read
$user->readOne();
// set page headers
$page_title = "Read One User";
include_once "layout_header.php";

// read users button
echo "
<div class='right-button-margin'>";
echo "
	<a href='index.php' class='btn btn-primary pull-right'>";
echo "Back";
echo "</a>";
echo "
</div>";
echo "
<br>";
echo "
	<br>";

// HTML table for displaying a user details
echo "
		<table class='table table-responsive table-bordered'>";

echo "
			<tr>";
echo "
				<td>
					<h4>First Name</h4>
				</td>";
echo "
				<td>
					<h4>{$user->firstname}</h4>
				</td>";
echo "
			</tr>";

echo "
			<tr>";
echo "
				<td>
					<h4>Last Name</h4>
				</td>";
echo "
				<td>
					<h4>{$user->lastname}</h4>
				</td>";
echo "
			</tr>";

echo "
			<tr>";
echo "
				<td>
					<h4>Email</h4>
				</td>";
echo "
				<td>
					<h4>{$user->email}</h4>
				</td>";
echo "
			</tr>";

echo "
			<tr>";
echo "
				<td>
					<h4>Contact Number</h4>
				</td>";
echo "
				<td>
					<h4>{$user->contact_number}</h4>
				</td>";
echo "
			</tr>";

echo "
			<tr>";
echo "
				<td>
					<h4>Address</h4>
				</td>";
echo "
				<td>
					<h4>{$user->address}</h4>
				</td>";
echo "
			</tr>";

echo "
			<tr>";
echo "
				<td>
					<h4>Access Level</h4>
				</td>";
echo "
				<td>
					<h4>{$user->access_level}</h4>
				</td>";
echo "
			</tr>";

echo "
			<tr>";
echo "
				<td>
					<h4>Department</h4>
				</td>";
echo "
				<td>";
// display category name
echo "
					<h4>";
$department->id = $user->department_id;
$department->readName();
echo $department->name;
echo "</h4>";
echo "
				</td>";
echo "
			</tr>";

echo "
		</table>";

// set footer
include_once "layout_foot.php";
?>
