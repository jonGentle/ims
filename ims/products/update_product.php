<?php
// retrieve one product 
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
  
// include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/product.php';
include_once '../objects/category.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare objects
$product = new Product($db);
$category = new Category($db);
  
// set ID property of product to be edited
$product->id = $id;
  
// read the details of product to be edited
$product->readOne();
  
// set page header
$page_title = "Edit Product Details";
include_once "layout_header.php";
  
// contents 
echo "<div class='right-button-margin'>
          <a href='index.php' class='btn btn-primary pull-right'>Back</a>
     </div>";
  
?>
<!-- 'update product' form  -->
<!-- post code  -->
<?php 
// if the form was submitted
if($_POST){
  
    // set product property values
    $product->name = $_POST['name'];
    $product->quantity = $_POST['quantity'];
    $product->description = $_POST['description'];
    $product->category_id = $_POST['category_id'];
  
    // update the product
    if($product->update()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Product was updated.";
        echo "</div>";
    }
  
    // if unable to update the product, notify the user
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update product.";
        echo "</div>";
    }
}
?>
  
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table  table-responsive table-bordered'>
  
        <tr>
            <td><h4>Name</h4></td>
            <td><input type='text' name='name' value='<?php echo $product->name; ?>' class='form-control' /></td>
        </tr>
  
        <tr>
        <td><h4>Available Quantity</h4></td>
            <td><input type='text' name='quantity' value='<?php echo $product->quantity; ?>' class='form-control' /></td>
        </tr>
  
        <tr>
        <td><h4>Description</h4></td>
            <td><textarea name='description' class='form-control'><?php echo $product->description; ?></textarea></td>
        </tr>
  
        <tr>
        <td><h4>Category</h4></td>
            <td>
                <!-- categories select drop-down  -->
                <?php
$stmt = $category->read();
  
// put them in a select drop-down
echo "<select class='form-control' name='category_id'>";
  
    echo "<option>Please select...</option>";
    while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
        $category_id=$row_category['id'];
        $category_name = $row_category['name'];
  
        // current category of the product must be selected
        if($product->category_id==$category_id){
            echo "<option value='$category_id' selected>";
        }else{
            echo "<option value='$category_id'>";
        }
  
        echo "$category_name</option>";
    }
echo "</select>";
?>
            </td>
        </tr>
  
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-success">Update</button>
            </td>
        </tr>
  
    </table>
</form>
<?php
// set page footer
include_once "layout_footer.php";
?>