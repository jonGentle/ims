<?php
// include database and object files
include_once '../config/database.php';
include_once '../config/core.php';
include_once "login_checker.php";
include_once '../objects/user.php';
include_once '../objects/department.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// pass connection to objects
$user = new User($db);
$department = new Department($db);
// set page header
$page_title = "Create User";
include_once "layout_head.php";

echo "
<div class='right-button-margin'>
	<a href='index.php' class='btn btn-primary pull-right'>Back</a>
</div>";
echo "
<br>";
?>
	<!-- php post code -->
	<?php // if the form was submitted
if ($_POST) {
    // set user property values
    $user->firstname = $_POST['firstname'];
    $user->lastname = $_POST['lastname'];
    $user->email = $_POST['email'];
    $user->contact_number = $_POST['contact_number'];
    $user->address = $_POST['address'];
    $user->password = $_POST['password'];
    $user->department_id = $_POST['department_id'];
    $user->access_level = 'User';
    $user->status = 1;

    // create user
    if ($user->create()) {
        echo "
	<div class='alert alert-success'>User was created.</div>";
    }

    // if unable to create user, notify the user
    else {
        echo "
	<div class='alert alert-danger'>Unable to create user.</div>";
    }
} ?>

	<!-- create user form  -->
	<form action="
		<?php echo htmlspecialchars(
    $_SERVER["PHP_SELF"]
); ?>" method="post">
		<table class='table table-responsive table-bordered'>
			<tr>
				<td>
					<h4>First Name</h4>
				</td>
				<td>
					<input type='text' name='firstname' class='form-control' />
				</td>
			</tr>
			<tr>
				<td>
					<h4>Last Name</h4>
				</td>
				<td>
					<input type='text' name='lastname' class='form-control' />
				</td>
			</tr>
			<tr>
				<td>
					<h4>Email</h4>
				</td>
				<td>
					<input type='text' name='email' class='form-control' />
				</td>
			</tr>
			<tr>
				<td>
					<h4>Contact Number</h4>
				</td>
				<td>
					<input type='text' name='contact_number' class='form-control' />
				</td>
			</tr>
			<tr>
				<td>
					<h4>Address</h4>
				</td>
				<td>
					<input type='text' name='address' class='form-control' />
				</td>
			</tr>
			<tr>
				<td>
					<h4>Password</h4>
				</td>
				<td>
					<input type='text' name='password' class='form-control' />
				</td>
			</tr>
			<tr>
				<td>
					<h4>Department</h4>
				</td>
				<td>
					<!-- departmentss from database  -->
					<?php
            // read the departments from the database
            $stmt = $department->read();

            // put them in a select drop-down
            echo "
					<select class='form-control' name='department_id'>";
            echo "
						<option>Select department...</option>";

            while ($row_department = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row_department);
                echo "
						<option value='{$id}'>{$name}</option>";
            }

            echo "
					</select>";
            ?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button type="submit" class="btn btn-primary">Create User</button>
				</td>
			</tr>
		</table>
	</form>
	<?php // footer
include_once "layout_foot.php";
?>
