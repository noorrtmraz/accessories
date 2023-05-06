<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/style.css">
   <title>Shopping cart</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style type="text/css">

    body{
      background-color: #9c8f4c45
    }

    .sign-btn{
      background-color: white;
      color:#9c8f4c;
      font-size: 15px;
      padding: 12px;
      border-radius: 5px;
      margin-right: -50px;
    }
      .container .user-profile p{
      margin: 10px;
      font-weight: bold;
      font-size: 15px;
      color:var(--black);
      }


      .container .user-profile{
      padding:0px;
      text-align: center;
      border:none;
      background-color: #eee;
      margin:-35px auto;
      max-width: 250px;
      float: right;
      }


      .container .heading{
      text-align: center;
      margin-top: 60px;
      margin-bottom: 40px;
      font-size: 29px;
      text-transform: capitalize;
      color:#9c8f4c;
      letter-spacing: 3px;
      }

   .btn{
   background-color: #9c8f4c;
   margin-top: 10px;
   font-weight: bold;
   width: 100px;
   text-align: center;
}

.btn:hover,
.delete-btn:hover,
.option-btn:hover{
   background-color: var(--black);
   transition: 0.6s;
}


.container .user-profile .flex{
   display: flex;
   justify-content: center;
   flex-wrap: wrap;
   align-items: flex-end;

}


.list li {
  float: right;
  margin-right: 90px;
  margin-top: -23px;
  color: white;
 }



/***********************************
Navigation bar
************************************/
.navbar-header{
  padding-top: 23px;
}

.navbar-default .navbar-brand {
    color: #e4e0ce;
}

.course-text{
    padding: 84px;
}
.navbar-default .navbar-nav > li > a {
    color: #717f86;
    font-size: 14px;
    font-weight: 700;
}
.navbar-nav > li > a{
   padding: 0px;
   margin: 10px 5px;
   padding: 10px 15px;
}
.navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > li > a:hover
{
   color: #bc3981;
    transition: 1s;
}

.navbar-nav .active a{
    background: none !important;
    color: #bc3981 !important;
    outline: none;
}

.navbar-default .navbar-brand {
    font-family: 'Dosis', sans-serif !important;
    font-weight: 700;
    letter-spacing: 2px;
    padding: 0px;
    height: inherit;
    font-size: 36px;
    margin: 20px 0px;
    margin-left: -57px;
}

.navbar-default .navbar-brand span{
   font-weight: 100 !important;
    font-size: 20px;
}
.navbar {
    margin-bottom: 0px;
}
.padding-zero{
   padding: 0px;
}    
.mart20{
   margin-top: 20px;
}

.navbar-right{
   float: right;
   margin-right: -15px;
}

ol, ul {
   list-style: none;
}

li
{
   display: inline;
}



/*********** banner ***************/

.banner{
  background: url('images/banner4.jpg') no-repeat center top;
    background-size: cover;
  min-height: 650px;
    position: relative;
    background-position: center;
}
.bg-color{
  background-color: RGBA(12, 11, 11, 0.52);
  min-height: 650px;
}
.text-dec{
  font-size: 24px;
  padding: 10px 20px;
    margin: 15px 0;
  text-transform: uppercase;
    color: #fff;
}
.text-border{
  border: 5px solid #9c8f4c;
  display: inline-block;
  margin-top: 150px;
  letter-spacing: 4px;
}
.intro-para{
  font-family: 'Alegreya Sans', sans-serif;
  font-size: 45px;
  color: #fff;
  margin-top: 30px;
}

.modal-dialog {
    width: 600px;
    margin: 150px auto;
}
.modal-content h4 {
    font-size: 1.5em;
    font-weight: 700;
}
.login-box-body {
    padding: 15px 30px;
}
.login-box-msg, .register-box-msg {
    margin: 0px;
    text-align: center;
    padding: 0px 20px 20px;
}
.modal-sm {
    width: 400px;
}
.padleft-right{
    padding-left: 5px;
    padding-right: 0px;
}
.big-text{
    font-size: 35px;
}

.quote .btn{
    background-color: #9c8f4c;
    color: #fff;
    -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  margin-top: 10px;
  width: 100px;
}
.quote .btn:hover, .quote .btn:focus{
    background-color: #fff;
    color: #9c8f4c;
    border-color: #fff;
     -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 1s ease-in-out;

}

.shop a{
  width: 300px;
  margin-left: 480px;
  margin-top: 50px;
  color: white;
  padding: 20px;
}


/***** about *********/

.section-about{

padding: 40px 0px;
    background-color:#f8f5f3;
    height: 500px
}

.det-p{
  font-size: 18px;
}

/******* footer *********/

footer{
  height: 100px;
  background-color: black;
}

.footer h4{
  color: white;
  text-align: center;
  padding-top: 40px;
}

 </style>


</head>
<body>
 
 <div class="banner">
    <div class="bg-color">
      <div class="container">
        <div class="row">
            <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php">ALNOOR<span> Accessories</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <div class="user-profile">

   <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>
   <div class="flex">
      <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are you sure you want to log out?');" class="sign-btn">sign out</a>
   </div>

</div>


  <ul class="list">
   <li><a href="products.php" class ="home" style="color:#e4e0ce; font-weight: bold; font-size: 20px;">Last product</a></li>
   <li><a href="#about" class ="about" style="color:#e4e0ce; font-weight: bold; font-size: 20px;">about</a></li>
   <li><a href="home.php" class="team" style="color:#e4e0ce; font-weight: bold; font-size: 20px;">Home</a></li>
   </ul>

      </div>
    </div>
  </nav>
        </div>
      </div>
    </div>
  </div>
  <!--/ Banner-->
   <!--Navigation bar-->


  <!--/ Navigation bar-->
   
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<div class="container">


<div class="products">

   <h1 class="heading">SHOP THE NEW COLLECTION</h1>

   <div class="box-container">
    <img src="images/banner.jfif" width="250px" height="250px">
    <img src="images/banner2.png" width="250px" height="250px">
    <img src="images/banner3.jfif" width="250px" height="250px">
    <img src="images/banner4.jpg" width="250px" height="250px">

   </div>
<div class ="shop">
   <a href="http://localhost/shop/products.php" class="btn btn-danger">Buy now from the store</a>
</div>
</div>
</div>

<section id="about" class="section-about">
    <div class="container">
      <div class="row">
               <div class="col-md-6">
          <div class="detail-info" style="width: 600px; float: right;">
            <hgroup>
              <h3 class="det-txt" style="font-size: 30px; color: #9c8f4c;"> About us </h3>
<br>
            </hgroup>
            <p class="det-p">Al Noor provides up-to-date and reliable information that makes finding the property of your dreams easy and fast. Provides information on residential and commercial real estate and rental real estate throughout Palestine first..</p>
            
            <p class="det-p">If you are just starting your search or are ready to make a purchase, my property is updated daily to ensure you have access to the latest and most accurate property listings. Features such as saving over 90% of areas in Palestine, social sharing and the ability to connect with local brokers are available to help you find the property you are looking for</p>
          </div>
        </div>

         <div class="col-md-6">
          <div class = "img-about">
             <img src="images/banner.jfif" width="500px" height="350px" style="float: left;">
          </div>
        </div>

      </div>
    </div>
  </section>

  <footer>
    <div class="footer">
      <h4>Developer By Noor Timraz</h4>
    </div>
  </footer>



</body>
</html>