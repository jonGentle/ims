<?php
// display the table if the number of users retrieved was greater than zero
if($num>0){

    echo "<div class='right-button-margin'>
    <a href='create_user.php' class='btn btn-success pull-right'>Add User</a>
    <br>
    <br>
</div>";

echo "<table class='table table-responsive table-bordered'>";
 
    // table headers
    echo "<tr>";
    echo  "<th><h4> First Name</h4></th>";
    echo "<th><h4>Last Name</h4></th>";
    echo "<th><h4> Email</h4></th>";
    echo "<th><h4> Contact Number</h4></th>";
    echo "<th><h4> Access Level</h4></th>";
    echo "<th><h4> Actions</h4></th>";
    echo "</tr>";
 
    // loop through the user records
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        // display user details
        echo "<tr>";
            echo "<td>{$firstname}</td>";
            echo "<td>{$lastname}</td>";
            echo "<td>{$email}</td>";
            echo "<td>{$contact_number}</td>";
            echo "<td>{$access_level}</td>";
            echo "<td>";
            // read one, edit and delete button 
            // read, edit and delete buttons
            echo "<a href='read_one.php?id={$id}' class='btn btn-primary left-margin'>";
            echo "<span class='glyphicon glyphicon-eye-open'></span> View Info";
        echo "</a> ";

        // edit user button
        echo "<a href='update_user.php?id={$id}' class='btn btn-info left-margin'>";
            echo "<span class='glyphicon glyphicon-pencil'></span> Edit Info";
        echo "</a> ";

        // delete user button
        echo "<a delete-id='{$id}' class='btn btn-danger delete-object'>";
            echo "<span class='glyphicon glyphicon-trash'></span> Delete";
        echo "</a> ";

        echo "</a>";
                   

        echo "</td>";

        echo "</tr>";

        }

    echo "</table>";

    $page_url="index.php?";
    $total_rows = $user->countAll();
 
    // actual paging buttons
    include_once 'paging.php';

}
 
// notify the user there are no records
else{
    echo "<div class='alert alert-danger'>
        <strong>No users found.</strong>
    </div>";
}
?>