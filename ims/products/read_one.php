<?php
// get ID of the product to be read
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
  
// set ID property of product to be read
$product->id = $id;
  
// read the details of product to be read
$product->readOne();
// set page headers
$page_title = "Product Details";
include_once "layout_header.php";
  
// read products button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-'></span> Back";
    echo "</a>";
echo "</div>";
// table for displaying a product details
echo "<table class='table  table-responsive table-bordered'>";
  
    echo "<tr>";
    echo "<th><h4> Name</h4></th>";
        echo "<td><h4>{$product->name}</h4></td>";
    echo "</tr>";
  
    echo "<tr>";
    echo "<th><h4> Available Quantity</h4></th>";
        echo "<td><h4>{$product->quantity}</h4></td>";
    echo "</tr>";
  
    echo "<tr>";
    echo "<th><h4> Description</h4></th>";
        echo "<td><h4>{$product->description}</h4></td>";
    echo "</tr>";
  
    echo "<tr>";
    echo "<th><h4> Category</h4></th>";
        echo "<td><h4>";
            // display category name
            $category->id=$product->category_id;
            $category->readName();
            echo $category->name;
        echo "</h4></td>";
    echo "</tr>";
    echo "<tr>";
echo "</tr>";
  
echo "</table>";
  
// set footer
include_once "layout_footer.php";
?>