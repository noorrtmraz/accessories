<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist!';
   }else{
      mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:login.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      input{
         text-align: center;
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

.btn{
   background-color: #2b9f8c;
   margin-top: 10px;
   width: 100%;
   height: 45px;
}

.form-container form p{
   margin-top: 20px;
   font-size: 12px;
   color:var(--black);
}

.form-container form{
   width: 500px;
   border-radius: 5px;
   border:none;
   padding:40px;
   text-align: center;
   background-color: var(--white);
   margin-top:35px;
   box-shadow: var(--box-shadow);
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
   margin-top: 37px;
   }

    body{
         background-color: #9c8f4c;
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
   <img src="images/log.jfif" width="420px" height="470px">

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