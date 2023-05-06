<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];

   $select = mysqli_query($con, "SELECT * FROM `admin` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist!';
   }else{
      mysqli_query($con, "INSERT INTO `admin`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:http://localhost/shop/admin/login.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register admin</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
 input{
         text-align: center;
      }

      body{
         background-color: #e4e0ce;
      }

   .form-container form{
   width: 450px;
   border-radius: 7px;
   border:none;
  background-color: #9c8f4c;
  /* margin-left:420px; */
   
   text-align: center;
   padding: 50px;
   padding-left: 30px;
   box-shadow: -5px -5px 8px #9c8f4c;
   margin: auto;
   margin-top:70px;
   margin-bottom: 40px;
   
}

.btn{
   background-color: #e4e0ce;
   margin-top: 10px;
   width:106%;
   height: 45px;
   border: none;
   border-radius: 5px;
   color: #8c824d;
   font-weight: bold;
   font-size: 20px;
   box-shadow: -3px -3px 4px #8c824d;

}
.btn:hover{
   background-color: white;
   color: black;
   transition: 0.5s;

}

.form-container form .box{
   width: 100%;
   border-radius: 5px;
   border:0.5px solid black;
   padding:12px 14px;
   font-size: 15px;
   margin:10px 0;
   height: 25px;
   text-align: left;

}

.form-container form p a{
   color:black;
}

.form-container form p{
   margin-top: 20px;
   font-size: 15px;
   color:white;
}

.form-container form h3{
   font-size: 25px;
   margin-bottom: 10px;
   text-transform: capitalize;
   color:white;
}

   </style>
</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Create an account</h3>
      <input type="text" name="name" required placeholder="Username" class="box">
      <input type="email" name="email" required placeholder="E-mail" class="box">
      <input type="password" name="password" required placeholder="Password" class="box">
      <input type="password" name="cpassword" required placeholder="Password again" class="box">
      <input type="submit" name="submit" class="btn" value="Register">
      <p>Do you already have an account? <a href="login.php"> Login</a></p>
   </form>

</div>

</body>
</html>