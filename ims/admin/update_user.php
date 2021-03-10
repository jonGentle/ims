<?php
// retrieve one user will be here
// get ID of the user to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 // include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/user.php';
include_once '../objects/department.php';
 // get database connection
$database = new Database();
$db = $database->getConnection();
 // prepare objects
$user = new User($db);
$department = new Department($db);
 // set ID property of user to be edited
$user->id = $id;
 // read the details of user to be edited
$user->readOne();
 // set page header
$page_title = "Update User Information";
include_once "layout_header.php";
 // contents will be here
echo "<div class='right-button-margin'>
         <a href='index.php' class='btn btn-primary pull-right'>Back</a>
    </div>";
    echo "<br>";
    echo "<br>";
 ?>
<!-- 'update user' form will be here -->
<!-- post code will be here -->
<?php
// if the form was submitted
if($_POST){
    // set user property values
   $user->firstname = $_POST['firstname'];
   $user->lastname = $_POST['lastname'];
   $user->email = $_POST['email'];
   $user->contact_number = $_POST['contact_number'];
   $user->address = $_POST['address'];
   $user->password = $_POST['password'];
   $user->access_level= $_POST['access_level'];
   $user->status= $_POST['status'];
   $user->department_id = $_POST['department_id'];

    // update the user
   if($user->update()){
       echo "<div class='alert alert-success alert-dismissable'>";
           echo "user was updated.";
       echo "</div>";
   }
    // if unable to update the user, tell the user
   else{
       echo "<div class='alert alert-danger alert-dismissable'>";
           echo "Unable to update user.";
       echo "</div>";
   }
}
?>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
   <table class='table table-responsive table-bordered'>
        <tr>
           <td><h4>First Name</h4></td>
           <td><input type='text' name='firstname' value='<?php echo $user->firstname; ?>' class='form-control' /></td>
       </tr>
        <tr>
        <td><h4>Last Name</h4></td>
           <td><input type='text' name='lastname' value='<?php echo $user->lastname; ?>' class='form-control' /></td>
       </tr>
        <tr>
        <td><h4>Email</h4></td>
           <td><input type='text' name='email' value='<?php echo $user->email; ?>' class='form-control' /></td>
       </tr>

       <tr>
       <td><h4>Contact Number</h4></td>
           <td><input type='text' name='contact_number' value='<?php echo $user->contact_number; ?>' class='form-control' /></td>
       </tr>

       <tr>
       <td><h4>Address</h4></td>
           <td><input type='text' name='address' value='<?php echo $user->address; ?>' class='form-control' /></td>
       </tr>

       <tr>
       <td><h4>Password</h4></td>
           <td><input type='text' name='password' value='<?php echo $user->password; ?>' class='form-control' /></td>
       </tr>

       <tr>
       <td><h4>Access Level </h4></td>
           <td><input type='text' name='access_level' value='<?php echo $user->access_level; ?>' class='form-control' /></td>
       </tr>

       <tr>
       <td><h4>Status</h4></td>
           <td><input type='text' name='status' value='<?php echo $user->status; ?>' class='form-control' /></td>
       </tr> 
        <tr>
        <td><h4>Department</h4></td>
           <td>
               <!-- categories select drop-down will be here -->
               <?php
$stmt = $department->read();
 // put them in a select drop-down
echo "<select class='form-control' name='department_id'>";
    echo "<option>Please select...</option>";
   while ($row_department = $stmt->fetch(PDO::FETCH_ASSOC)){
       $department_id=$row_department['id'];
       $department_name = $row_department['name'];
        // current department of the user must be selected
       if($user->department_id==$department_id){
           echo "<option value='$department_id' selected>";
       }else{
           echo "<option value='$department_id'>";
       }
        echo "$department_name</option>";
   }
echo "</select>";
?>
           </td>
       </tr>
        <tr>
           <td></td>
           <td>
               <button type="submit" class="btn btn-success">Update User</button>
           </td>
       </tr>
    </table>
</form>
<?php
// set page footer
include_once "layout_foot.php";
?>



