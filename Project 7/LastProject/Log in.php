<?php

include("database.php");

if(isset($_GET['submit'])) {
$email = $_POST['email'];
$password = $_POST['password'];

$result = mysqli_query($con, "SELECT * Form signup WHERE email = '$email'");

$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) > 0){
  if($password == $row["passwords"]){
    $_SESSION["log in"] = true;
    $_SESSION["email"] = $row["email"];
    header ('location:asset_reg.php');
  }
  else{
    echo "Wrong password";
  }
}else {
  echo "Accounnt is not exist";
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script> 
    <script src="https://kit.fontawesome.com/97cdf934e8.js" crossorigin="anonymous"></script>
    <title>Log In</title>
</head>
<style>

  body{
    background: url(imgs/SL-113022-54210-20.jpg) no-repeat;
    background-size: cover;
    background-position: center;
  }
  .container{
    background: transparent;
    backdrop-filter: blur(20px);
}
p{
  color: #001A6E;
}
.input-group-text{
  background: none;
  color: #001A6E;
}
.input-group{
  border: 20px;
}
a{
  text-decoration: none;
  color: #001A6E;
}
.btn{
  background-color: #001A6E;
  border-radius: 18px;
}
.here p{
    color: #fff;
    text-align: center;
}
.here a{
    color: red;
    text-align: center;
}

  </style>
<body>
   
                                       <!--Log In-->

  <div class="warpper">
  <div class="container mt-5 w-50 d-flex justify-content-center align-items-center">
   
    <form class="log-in p-3" method="POST">
       
      <figure class="figure">
        <img src="imgs/LOGO-AI-removebg-preview.png" class="figure-img img-fluid mx-auto d-flex justify-content-center align-items-center" style="width: 30%;">
      </figure>
                <p class="h6 text-center">We Are Happy To See You Back</p>

        <div class="message" style="color: #eb1325;">
        <?php if (!empty($message)) echo $message; ?>
        </div>


      <div class="mb-3">
        <label for="username" class="form-label">Email</label>
        <div class="input-group">
        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your username" required>
      </div>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
      </div>
      </div>

      <label><input type="checkbox"> Remember me </label>

      <button type="submit" name="submit" class="btn w-75 mt-3 ms-5" style="color: #fff;"><a href="asset_reg.php" style="color: white;"> Log In</button>

      <div class="here mt-3">
      <p>Don't Have An Acouunt? <a href="signup.php">Click Here Please</a></p>
      </div>

    </form>
     
     
   
    </div>
  </div>
</body>
</html>