<?php
// search form
echo "<form role='search' action='search.php'>";
    echo "<div class='input-group col-md-3 pull-left margin-right-1em'>";
        $search_value=isset($search_term) ? "value='{$search_term}'" : "";
        echo "<input type='text' class='form-control' placeholder='Lookup Product...' name='s' id='srch-term' required {$search_value} />";
        echo "<div class='input-group-btn'>";
            echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
        echo "</div>";
    echo "</div>";
echo "</form>";
echo "<br>";
  
// create product button
echo "<div class='right-button-margin'>";
    echo "<a href='create_product.php' class='btn btn-success pull-right'>";
        echo "<span class='glyphicon glyphicon-plus'></span> Add Item";
    echo "</a>";
echo "</div>";

  
// display the products if there are any
if($total_rows>0){
  
    echo "<table class='table table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th><h4> Product</h4></th>";
            echo "<th><h4> Available Quantity</h4></th>";
            echo "<th><h4> Description</h4></th>";
            echo "<th><h4> Category</h4></th>";
            echo "<th><h4> Actions</h4></th>";
        echo "</tr>";
  
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  
            extract($row);
  
            echo "<tr>";
                echo "<td>{$name}</td>";
                echo "<td>{$quantity}</td>";
                echo "<td>{$description}</td>";
                echo "<td>";
                    $category->id = $category_id;
                    $category->readName();
                    echo $category->name;
                echo "</td>";
  
                echo "<td>";
  
                    // read product button
                    echo "<a href='read_one.php?id={$id}' class='btn btn-primary left-margin'>";
                        echo "<span class='glyphicon glyphicon-eye-open'></span> View Details";
                    echo "</a> ";
  
                    // edit product button
                    echo "<a href='update_product.php?id={$id}' class='btn btn-info left-margin'>";
                        echo "<span class='glyphicon glyphicon-pencil'></span> Edit Details";
                    echo "</a> ";
  
                    // delete product button
                    echo "<a delete-id='{$id}' class='btn btn-danger delete-object'>";
                        echo "<span class='glyphicon glyphicon-trash'></span> Delete";
                    echo "</a> ";
  
                echo "</td>";
  
            echo "</tr>";
  
        }
  
    echo "</table>";
    // view all button
echo "<div class='right-button-margin'>";
echo "<a href='index.php' class='btn btn-success pull-right'>";
    echo "View All";
echo "</a>";
echo "</div>";
  
    // paging buttons
    include_once 'paging.php';
}
  
// notify the user if there are no products
else{
    echo "<div class='alert alert-danger'>No products found.</div>";
}
?>