<?php include("db.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"href="style.css">
</head>
<body>
    <nav class="navbar">
   <div class= "logo">
     <img src="https://th.bing.com/th/id/OIP.Uqq2J01zFaRMrqfWZcUJWwHaHa?w=169&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" alt="Logo">
   </div>
      <!-- space between -->
      <ul class="nav-links">
    <li><a href="main.php">Home</a></li>
    <li><a href="#">Products</a></li>
    <li><a href="#">Cart</a></li>
    <li>
       <?php if (isset($_SESSION["username"])&& $_SESSION["username"]!="") {?>
       <a href="#"><?=$_SESSION['username']?> </a>
       <div class="submenu">
         <ul class="dropdown">
          <li><a href="profile.php">Profile </a></li>
          <li><a href="logout.php">Logout</a></li>
           </ul>
       </div>
       <?php }else{ ?>
          <a href="index.php">Login</a>
          <a href="register.php">Register</a>
        <?php } ?>

</li>
</ul>
</nav>  