<?php

include('header.php'); 

if(isset($_POST['update_btn'])) {
    $id = $_POST['id'];
    $SKU = $_POST['SKU'];
    $PRICE = $_POST['PRICE'];
    $Quantity = $_POST['Quantity'];

   
    $sql = "UPDATE products SET SKU=?, PRICE=?, Quantity=?, `date-update`=NOW() WHERE Id=?";

    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param("ssdi", $SKU, $PRICE, $Quantity, $id);

    if($stmt->execute()) {
        echo "<script>alert('Update Successful!'); window.location.href='product.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
} else {
  
    header("Location: product.php");
}
?>