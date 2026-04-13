<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] =2;
    }
     function cart_redirect(){
     echo"<script>
     alert('Cart updated successfully');
     window.location.href='cart.php';
     </script>";
     file_put_contents('cart.json',json_encode($_SESSION['cart']));
     exit;
     }
}
header("location:product.php");
exit();
?>
