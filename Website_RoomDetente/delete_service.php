<!-- Delete Products -->

<!-- Delete Logic -->
<!-- PHP Code -->
<?php
 $mysqli=require __DIR__."/database.php";

 if(isset($_GET['delete']))
 {
    $delete_id=$_GET['delete'];
    $sql = "DELETE FROM massage
            WHERE id=$delete_id";

    $stmt = $mysqli->stmt_init();
    if ( ! $stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    if($stmt->execute())
    {
        echo "Product deleted";
        header('location:dashboard_admin.php');
    }
    else
    {
        echo "Product not deleted";
        header('location:dashboard_admin.php');
    }
 }