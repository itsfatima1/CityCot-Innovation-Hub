<?php 

include("database.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];




$insert = "INSERT INTO signup (fname, lname, 	email, passwords)
VALUES ('$fname', '$lname', '$email', '$password')";

if ($con->query($insert) === TRUE) {  
  header ('location:welcome.php');
} else {
    $message = "<p class='signup-error'>This Email Is Already Exist</p>";
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
    <title>Sign Up</title>
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
  box-shadow:rgb(73, 84, 117);
}
.btn:hover{
    color: #DBD3D3;
    cursor: pointer;
}
.here p{
    color: #fff;
    text-align: center;
}
.here a{
    color: red;
    text-align: center;
}
.message{
  color: #eb1325;
  font-size: 20px;
}


</style>
<body>
  
<!--Sign Up-->

<div class="warpper">
  <div class="container mt-5 w-50 d-flex justify-content-center align-items-center">
   
    <form class="log-in p-3" method="post">
       
      <figure class="figure">
        <img src="imgs/LOGO-AI-removebg-preview.png" class="figure-img img-fluid mx-auto d-flex justify-content-center align-items-center" style="width: 30%;">
      </figure>
                <p class="h6 text-center">Please Fill In Your Information Here</p>

                <div class="message" style="color: #eb1325;">
        <?php if (!empty($message)) echo $message; ?>
        </div>

    <div class="mb-3">
        <label for="password" class="form-label">First Name</label>
        <div class="input-group">
        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" required>
      </div>
      </div>
      
      <div class="mb-3">
        <label for="password" class="form-label">Last Name</label>
        <div class="input-group">
        <span class="input-group-text"><i class="fa-solid fa-signature"></i></span>
        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" required>
      </div>
      </div>

      <div class="mb-3">
        <label for="username" class="form-label">Email</label>
        <div class="input-group">
        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
      </div>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
      </div>
      </div>


      <button type="submit" class="btn w-75 mt-3 ms-5" style="color: #fff;">Sign In</button><br>

      <div class="here mt-3">
      <p>Already Have An Account? <a href="Log in.php">Click Here Please</a></p>
      </div>

    </form>
     
     
   
    </div>
  </div>
</body>
</html>    
