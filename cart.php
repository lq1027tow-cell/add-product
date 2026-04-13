<?php
include('db.php'); 


if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]);
    }
    header("Location: cart.php");
    exit();
}

if (isset($_GET['clear'])) {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Cart</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background-color: #f4f7f6; }
        .cart-container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; }
        .total-row { font-weight: bold; font-size: 1.2em; color: #333; }
        .btn-delete { color: #ff4d4d; text-decoration: none; font-weight: bold; }
        .btn-checkout { background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; float: right; margin-top: 20px; }
        .btn-clear { color: #666; font-size: 0.9em; text-decoration: none; margin-top: 10px; display: inline-block; }
    </style>
</head>
<body>

<div class="cart-container">
    <h2>Shopping Cart</h2>
    <a href="product.php" style="text-decoration:none; color:#007bff;">← Back to Product List</a >
    
    <?php 
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): 
    ?>
        <table>
            <thead>
                <tr>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
           <tbody>
<?php
$total_price = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    
    $cart_keys = array_keys($_SESSION['cart']);
    
    $ids = implode(',', $cart_keys);
    $sql = "SELECT * FROM products WHERE Id IN ($ids)";
   
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['Id']; 
            $qty = $_SESSION['cart'][$id];
            
            $price = $row['PRICE']; 
            $subtotal = $price * $qty;
            $total_price += $subtotal;
?>
            <tr>
                <td><?php echo $row['SKU']; ?></td>
                <td>$<?php echo number_format($price, 2); ?></td>
                <td><?php echo $qty; ?></td>
                <td>$<?php echo number_format($subtotal, 2); ?></td>
                <td>
                    <a href=" >" class="btn-delete">Remove</a >
                </td>
            </tr>
<?php
        }
    }
} else {
    echo "<tr><td colspan='5' align='center'>Your cart is empty!</td></tr>";
}
?>
    <tr class="total-row">
        <td colspan="3" align="right">Grand Total:</td>
        <td colspan="2">$<?php echo number_format($total_price, 2); ?></td>
    </tr>
</tbody>
        </table>
        
        <div style="margin-top: 20px;">
            <a href="cart.php?clear=1" class="btn-clear" onclick="return confirm('Clear all items?')">Empty Cart</a >
            <a href="checkout.php" class="btn-checkout">Checkout Now</a >
        </div>

    <?php else: ?>
        <div style="text-align:center; padding: 50px;">
            <p style="font-size: 1.2em; color: #666;">Your cart is empty!</p >
            <a href="product.php" class="btn-checkout" style="float:none; display:inline-block;">Go Shopping</a >
        </div>
    <?php endif; ?>
</div>

</body>
</html>