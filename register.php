<?php
include "db.php";

 if($_SERVER['REQUEST_METHOD']==='POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confrim_password=$_POST['confrim_password'];

     $qry=$conn->prepare("SELECT * FROM users WHERE username=?");
     $qry->bind_param("s",$username);
     $qry->execute();
     $result=$qry->get_result();
     if($result->num_rows>0){
    echo"Username already exists!";
     exit();
     }
     
    if($password===$confrim_password){
    $hashed_password=password_hash($password,PASSWORD_DEFAULT);
    $stmt=$conn->prepare("INSERT INTO users(username,password)VALUES(?,?)");
    $stmt->bind_param("ss",$username,$hashed_password);
    $stmt->execute();
    $stmt->close();
    echo"Registration successful!";
    }else{
    echo"Passswords do not match!";
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
     <link rel="stylesheet" href="style.css"/>
</head>
<body>
      <div class="container">
        <h1>Register</h1>
        <div class="card">
            <form action ="register.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password"> Password:</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for=" confrim password">Confrim Password:</label>
                    <input type=" confrim password" id="confrim_password" name="confrim_password">
                </div>
                 <a href="index.php">Login page</a><br>
                    <button type="submit" value="Login">register</button>
            </form>
        </div>
    </div>
    
    
</body>
</html>