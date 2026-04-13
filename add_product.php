<?php include('header.php');
   
 if($_SERVER["REQUEST_METHOD"]==="POST"){
    $p_id=$_POST["p_id"];
    $SKU=$_POST["SKU"];
    $PRICE=$_POST["PRICE"];
    $Quantity=$_POST["Quantity"];

    $stmt=$conn->prepare("INSERT INTO products(p_id,SKU,PRICE,Quantity)VALUES(?,?,?,?)");
    $stmt->bind_param("ssss",$p_id,$SKU,$PRICE,$Quantity);
    $stmt->execute();
    echo "<script>window.location.href='product.php'</script>";
 }
    ?>
<div class="container">
    <h1>products</h1>
    <div class="uc-card">
        <form action="" method="post">
        <div class="form-group">
            <label for="p_id">p_id:</label>
            <input type="text" id="p_id" name="p_id">
        </div>
        <div class="form-group">
            <label for="SKU">SKU: </label>
            <input for="SKU" id="SKU" name="SKU">
        </div>
        <div class="form-group">
            <label for="PRICE">PRICE:</label>
            <input type="PRICE" id="PRICE" name="PRICE">

<div class="form-group">
            <label for="Quantity">Quantity:</label>
            <input type="Quantity" id="Quantity" name="Quantity">

            <button type="submit" value="SUBMIT">SUBMIT</button>
</div>
  </div>
</div>
<?php include('footer.php'); ?>