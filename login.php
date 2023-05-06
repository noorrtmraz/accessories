<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email =$_POST['email'];
   $password = md5($_POST['password']);

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      input{
         text-align: center;
      }

      body{
         background-color: #9c8f4c;
      }

      .form-container form{
   width: 500px;
   border-radius: 5px;
   border:none;
   box-shadow: var(--box-shadow);
   padding:40px;
   text-align: center;
   background-color: var(--white);
}

.btn{
   background-color: #9c8f4c;
   margin-top: 10px;
   width:100%;
   height: 40px;
   color: white;
   font-size: 18px;
   font-weight: bold;
}

.btn:hover{
   background-color: black;
   transition:0.5s;
}

.form-container form .box{
   width: 100%;
   border-radius: 5px;
   border:0.5px solid black;
   padding:12px 14px;
   font-size: 15px;
   margin:10px 0;
   height: 45px;
   text-align: left;
}

.form-container form p a{
   color:var(--red);
}

.form-container form p{
   margin-top: 20px;
   font-size: 12px;
   color:var(--black);
}

.form-container form h3{
   font-size: 20px;
   margin-bottom: 10px;
   text-transform: capitalize;
   color:var(--black);
}

.form-container img{
   margin-right:30px; 
   border:25px solid white; 
   }
   </style>

</head>
<body>

   
<div class="form-container">


   <img src="images/log.jfif" width="340px" height="340px">

   <form action="" method="post">
      <h3>Login</h3>
      <input type="email" name="email" required placeholder="E-mail" class="box">
      <input type="password" name="password" required placeholder="password" class="box">
      <input type="submit" name="submit" class="btn" value="Login">
      <p>Do you already have an account? <a href="register.php">new account</a></p>
   </form>


</div>

</body>
</html>