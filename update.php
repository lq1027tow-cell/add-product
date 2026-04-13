<?php
include('db.php'); 

$id =$_GET['id']; 

$qry = $conn->prepare("SELECT * FROM products WHERE Id=?");
$qry->bind_param("i", $id);
$qry->execute();
$result = $qry->get_result();
$row = $result->fetch_assoc(); 
?>
<form action="save_update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">

    <p>
        SKU: <br>
        <input type="text" name="SKU" value="<?php echo $row['SKU']; ?>">
    </p >

    <p>
        PRICE: <br>
        <input type="text" name="PRICE" value="<?php echo $row['PRICE']; ?>">
    </p >

    <p>
        Quantity: <br>
        <input type="text" name="Quantity" value="<?php echo $row['Quantity']; ?>">
    </p >

    <button type="submit" name="update_btn" class="btn btn-success">Save Changes</button>
    <a href="product.php">Cancel</a >
</form>