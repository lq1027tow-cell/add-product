<?php 
include('header.php');
include("security.php");

 if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $phone=$_POST["phone"];
    $gender=$_POST["gender"];
    $email=$_POST["email"];
    $address=$_POST["address"];

    $qry=$conn->prepare("UPDATE users SET name=?,phone=?,gender=?,email=?,address=? WHERE username=?");
    $qry->bind_param("ssssss",$name,$phone,$gender,$email,$address, $_SESSION["username"]);
    if($qry->execute()){
        echo "<script>alert('Profile updated sucessfully');</script>";
    }else{
        echo"<script>alert('Failed to update profile');</script>";
    }
 }

    $qry=$conn->prepare("SELECT * FROM users WHERE Username=?");
        $qry->bind_param("s",$_SESSION["username"]);
        $qry->execute();
        $result=$qry->get_result();
        $user = $result->fetch_assoc();
 ?>
<div class="container profile-page">
  <div class="profile-card">
    <h1>Profile Page</h1>
    <form action="" method="post">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" class="form-control" value="<?=$_SESSION['username']?>" readonly>
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?=$user["name"]?>" >
    </div>
           <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" class="form-control" value="<?=$user["phone"]?>" >
</div>
    <div class="form-group">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" class="form-control">
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="<?=$user["email"]?>" >
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" class="form-control" value="<?=$user["address"]?>" >
    </div>
     <button type ="submit" class ="btn btn-primary">Update Profile</button>
</div>
    </div>
    </form>
<?php include('footer.php'); ?>